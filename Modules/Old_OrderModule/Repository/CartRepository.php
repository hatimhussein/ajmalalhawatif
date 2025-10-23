<?php

namespace Modules\OrderModule\Repository;


use Illuminate\Support\Collection;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\CommonModule\Helper\LanguageHelper;
use Modules\CommonModule\Helper\ProductHelper;
use Modules\OrderModule\Entities\Cart;
use Modules\UserModule\Entities\User;

class CartRepository
{
    use ApiResponseHelper;


    private static function model()
    {
        return new Cart();
    }

    function getAbandonedCarts()
    {
        $query = self::model()->newQuery();
        $query = $this->getCartJoinsCombinationQuery($query);

        $query->with(['product', 'user', 'discounts' => function ($q) {
            $q->where('start_date', "<=", date('Y-m-d'))
                ->where('end_date', ">=", date('Y-m-d'));
        }, 'discounts.offer' => function ($q) {
            $q->where('start_date', "<=", date('Y-m-d'))
                ->where('end_date', ">=", date('Y-m-d'));
        }]);

        return $query->get()->groupBy('user_id');
    }

    function prepareAbandonedCarts(Collection $carts)
    {
        return $carts->map(function ($item) {
            $first = $item->first();
            $final['user'] = $user = $first->user ?? null;
            if (!$user) return null;
            $price_level = ProductHelper::getPriceLevel($user->prices_level);
            $final['count'] = $item->count();
            $final['updated_at'] =  $first->updated_at;
            $final['total_price'] = $this->getAbandonedCartTotalPrice($item, $user, $price_level);
            return $final;
        })->filter();
    }

    function getAbandonedCartTotalPrice(Collection $cart, $user, $price_level)
    {
        return $cart->reduce(function ($total, $item) use ($price_level, $user) {
            $total += $this->getCartItemPrice($item, $user, $price_level) * $item->quantity;
            return $total;
        });
    }

    function getCartItemPrice($item, $user, $price_level)
    {
        if ($item->use_offer_price) {
            if ($item->offer_type = 'value')
                return $item->use_offer_price;
            else {
                $discount = $this->getCartProductDiscount($item, $user->prices_level);
                $price = ProductHelper::getRawDiscountPrice($item->product->$price_level, $discount);
                $price += $item->combination_price ?? 0;
                return ($price - (($price * $item->use_offer_price) / 100));
            }
        } else {
            $discount = $this->getCartProductDiscount($item, $user->prices_level);
            $price = ProductHelper::getRawDiscountPrice($item->product->$price_level, $discount);
            return $price + ($item->combination_price ?? 0);
        }
    }

    function getCartProductDiscount($product, $user_price_level)
    {
        return $product->discounts->filter(function ($item) use ($product, $user_price_level) {
            if ($item->discount_quantity <= $product->quantity) {
                if ($item->offer_id) {
                    if ($item->offer && strpos($item->offer->viewed_levels, chr($user_price_level)) !== false) {
                        return true;
                    }
                } else {
                    return true;
                }
            }
        })->first();
    }

    function getUserCartProductsById($id)
    {
        $user = User::where('id', $id)->with(['cart' => function ($q) {
            return $this->getCartJoinsCombinationQuery($q);
        }])->first();
        $user->cart = $this->prepareUserCart($user);
        return $user;
    }

    function prepareUserCart($user)
    {
        $user->cart->loadMissing(['product.combinations', 'combination', 'discounts' => function ($q) {
            return $q->where('start_date', "<=", date('Y-m-d'))
                ->where('end_date', ">=", date('Y-m-d'));
        }, 'discounts.offer' => function ($q) {
            return $q->where('start_date', "<=", date('Y-m-d'))
                ->where('end_date', ">=", date('Y-m-d'));
        }]);


        $price_level = ProductHelper::getPriceLevel($user->prices_level);

        return $user->cart->map(function ($item) use ($user, $price_level) {
            $item->name = LanguageHelper::nameTranslate($item->product);
            $item->combination_name = $item->combination_names ?? '';
            $item->item_price = $this->getCartItemPrice($item, $user, $price_level);
            return $item;
        });
    }

    function getCartJoinsCombinationQuery($q)
    {
        return $q->leftJoin('product_combinations', function ($join) {
            $join->on('product_combinations.product_id', '=', 'carts.product_id')
                ->on('product_combinations.combination_values', '=', 'carts.item_combination');
        })->groupBy('carts.id')
            ->select('carts.*', 'product_combinations.combination_names', 'product_combinations.combination_values', 'product_combinations.combination_price');
    }

    function checkQuantity($cartItem, $quantity)
    {
        if ($cartItem->item_combination) {
            if (($cartItem->combination->combination_quantity ?? 0) >= $quantity)
                return true;
        } else {
            if (($cartItem->product->product_quantity ?? 0) >= $quantity)
                return true;
        }
        return false;
    }

    function addCombinationToUserCart($product, $combination, $quantity, $user)
    {
        $cartProduct = $user->cart()->where('product_id', $product->id)->where('item_combination', $combination->combination_values)->first();
        $quantity = $quantity + ($cartProduct->quantity ?? 0);
        if ($combination->combination_quantity >= $quantity) {
            if ($cartProduct) {
                $cartProduct->update(['quantity' => $quantity]);
            } else {
                $item = [
                    'product_id' => $product->id,
                    'item_combination' => $combination->combination_values,
                    'quantity' => $quantity
                ];
                $this->create($item, $user);
            }
            return true;
        } else {
            return $this->setCode(201)->setSuccess(__('commonmodule::validation.quantity_unavilable') . ' ' . $combination->combination_quantity . ' ' . $quantity)->send();
        }
    }

    function addSimpleProductToUserCart($product, $quantity, $user)
    {
        $cartProduct = $user->cart()->where('product_id', $product->id)->where('item_combination', null)->first();
        $quantity = $quantity + ($cartProduct->quantity ?? 0);
        if ($product->product_quantity >= $quantity) {
            if ($cartProduct) {
                $cartProduct->update(['quantity' => $quantity]);
            } else {
                $item = [
                    'product_id' => $product->id,
                    'item_combination' => null,
                    'quantity' => $quantity
                ];
                $this->create($item, $user);
            }
            return true;
        } else {
            return $this->setCode(201)->setSuccess(__('commonmodule::validation.quantity_unavilable'))->send();
        }
    }

    function getAddCartResponseData()
    {
        $cart_data = (new OrderRepository())->getCartData();
        $data['cart_data'] = $cart_data;
        $data['currency'] = session('currency');
        $data['currency_name'] = (app()->isLocale('en')) ? $data['currency']['name_en'] : $data['currency']['name_ar'];
        $data['message'] = __('commonmodule::validation.add_to_cart_success');
        return $data;
    }

    function create($item, $user = null)
    {
        return self::model()->create(['product_id' => $item['product_id'], 'item_combination' => $item['item_combination'] ?? null, 'quantity' => $item['quantity'], 'user_id' => $user->id ?? auth()->user()->id]);
    }

    function find($id)
    {
        return self::model()->find($id);
    }

    function findWhere($where)
    {
        $query = self::model()->newQuery();
        foreach ($where as $key => $value) {
            $query->where($key, $value);
        }
        return $query->first();
    }

    function updateWhere($where, $data): int
    {
        $query = self::model()->newQuery();
        foreach ($where as $key => $value) {
            $query->where($key, $value);
        }
        return $query->update($data);
    }

    function delete($id)
    {
        $cartItem = $this->find($id);
        if ($cartItem)
            $cartItem->delete();
    }
}
