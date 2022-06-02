<?php

namespace App\Imports;

use Modules\ProductModule\Entities\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\ProductFeatureModule\Entities\Attribute;
use Modules\ProductFeatureModule\Entities\Brand;
use Modules\ProductModule\Entities\Category;
use Modules\ProductModule\Entities\PoductAttribute;

class ProductsImport implements ToCollection
{
    public function collection(Collection $rows)
    {

//        dd($rows);

        $attributes = collect([]);

        foreach ($rows as $index => $row) {
            if (is_null($row[0] ?? null)) continue;
            if ($index == 0) {
                for ($i = 18; $i < count($row); $i++) {
                    $attribute = Attribute::whereNotIn('id', $attributes->pluck('id')->filter()->toArray())->where(function ($q) use ($row, $i) {
                        $q->where('name_ar', 'like', '%' . $row[$i] . '%')->orWhere('name_en', 'like', '%' . $row[$i] . '%');
                    })->first();
                    $attributes->push($attribute);
                }
            } else {

                $category = Category::where(function ($q) use ($row) {
                    $q->where('name_ar', 'like', '%' . $row[0] . '%')->orWhere('name_en', 'like', '%' . $row[1] . '%');
                })->doesntHave('child')->first();

                $brand = Brand::where('name_ar', 'like', '%' . $row[2] . '%')->orWhere('name_en', 'like', '%' . $row[3] . '%')->first();
                if ($category && $brand) {
//                    dd($row[13]);
                    $product = Product::query()->updateOrCreate([
                            'product_code' => $row[4],
                            'item_number' => $row[29],
                        ],
                        [
                        'parent_id' => $category->id,
                        'brand_id' => $brand->id,
    //                        'product_code' => $row[4],
                        'type' => $row[6] == 'combination' ? $row[6] : 'simple',
                        'name_ar' => $row[7],
                        'name_en' => $row[8],
                        'desc_ar' => $row[9],
                        'desc_en' => $row[10],
                        'short_desc_ar' => $row[11],
                        'short_desc_en' => $row[12],
                        'product_price1' => $row[13],
                        'product_price2' => $row[14],
                        'product_price3' => $row[15],
                        'product_price4' => $row[16],
                        'product_price' => $row[17],
                        'product_quantity' => $row[18],
                        'status' => $row[5],
                        'item_number' => $row[29],
                    ]);

                    if ($product) {
                        foreach ($attributes as $key => $attribute) {
                            if ($attribute) {
                                $product->attributes()->attach($attribute->id, ['attribute_value' => $row[18 + $key]]);
                            }
                        }
                    }
                }
            }
        }
    }
}
