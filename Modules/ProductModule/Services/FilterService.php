<?php


namespace Modules\ProductModule\Services;


use Illuminate\Support\Facades\DB;
use Modules\CommonModule\Helper\ProductHelper;
use Modules\ProductModule\Entities\Product;

class FilterService
{
    public function getFilterQuery($request)
    {
        $query = Product::query();

        $query = $this->queryGeneralFiltering($query, $request);

        $sort_by = $request->get('sortby', 'product_price');
        $sort_type = $request->get('sorttype', 'desc');
        return $this->querySorting($query, $sort_by, $sort_type);
    }

    public function queryGeneralFiltering($query, $request)
    {
        if ($request->category_ids) {
            $ids = ($request->category_ids != null) ? explode(',', $request->category_ids) : [];
            $query->where(function ($q) use ($ids) {
                return $q->whereIn('parent_id', $ids)
                    ->orWhereHas('category', function ($q) use ($ids) {
                        return $q->whereIn('parent_id', $ids);
                    });
            });
        }

        if ($request->brands) {
            $brands = explode(',', $request->brands);
            $query->whereIn('brand_id', $brands);
        }


        $prices = $request->get('price');
        if ($prices && $prices != 'undefined') {
            $prices = explode(',', $prices);
            $query->whereBetween('product_price', $prices);
        }
        if ($request->has('options_values') && $request->options_values != null) {
            $optionValues = explode(',', $request->options_values);

            $query->whereHas('option_values', function ($q) use ($optionValues) {
                return $q->whereIn('option_value_id', $optionValues);
            });
        }

        return $query;
    }

    public function querySorting($query, $sort_by, $sort_type)
    {
        if (in_array($sort_by, ['product_price', 'topsell', 'reviews', 'parent_id', 'discountsproducts', 'newproducts'])) {
            switch ($sort_by) {
                case 'product_price':
                    $price_column = 'product_price';
                    $price_level = 5;
                    if (auth()->check() && auth()->user()->is_merchant) {
                        $price_level = auth()->user()->prices_level;
                        $price_column = ProductHelper::getPriceLevel($price_level);
                    }

                    $query->select(DB::raw("`products`.*,
                (CASE WHEN `product_discounts`.`discount_type` = 'value' THEN
                `products`.`{$price_column}` - `product_discounts`.`discount_value`
                WHEN `product_discounts`.`discount_type` = 'percentage' THEN
                (`products`.`{$price_column}` * (1-(`product_discounts`.`discount_value`/ 100)))
                ELSE `products`.`{$price_column}`
                END) as `final_price`"))
                        ->leftjoin(DB::raw("
                        (SELECT * FROM `product_discounts` WHERE (`product_discounts`.`discount_quantity` = 1
                        OR `product_discounts`.`discount_quantity` is NULL)
                        AND (date(`product_discounts`.`start_date`) <= '" . now() . "'
                            and date(`product_discounts`.`end_date`) >= '" . now() . "'
                            or `product_discounts`.`end_date` is null)
                        AND (`product_discounts`.`offer_id` = 0 or `product_discounts`.`offer_id` is null
                            or exists (select `offers`.`id` from `offers`
                                where `offers`.`id` = `product_discounts`.`offer_id`
                                and find_in_set(" . $price_level . ", `offers`.`viewed_levels`) != 0)))
                        as `product_discounts`
                           "), 'products.id', 'product_discounts.product_id')
                        ->groupBy('products.id')
                        ->orderBy('final_price', $sort_type);
                    break;

                case 'reviews':
                    $query->select(DB::raw('*, (SELECT AVG(stars) FROM product_reviews WHERE products.id = product_reviews.product_id AND product_reviews.is_shown = 1) as avg_reviews'))->orderBy('avg_reviews', 'desc');
                    break;

                case 'topsell':
                    $query->select(DB::raw('*, (SELECT COUNT(product_id) FROM order_products WHERE products.id = order_products.product_id ) as count_order'))->orderBy('count_order', 'desc');
                    break;

                case 'discountsproducts':
                    $query->Has('discounts')->orderBy('id', 'desc');
                    break;

                case 'newproducts':
                    $query->orderBy('id', 'desc');
                    break;

                default:
                    $query->orderBy($sort_by, $sort_type);
                    break;
            }
        } else {
            $query->orderBy('sort');
        }

        return $query;
    }
}
