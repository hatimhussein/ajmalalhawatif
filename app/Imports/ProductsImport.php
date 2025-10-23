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
                    $q->where('name_ar', 'like', '%' . $row[1] . '%')->orWhere('name_en', 'like', '%' . $row[1] . '%');
                })->doesntHave('child')->first();

                $brand = Brand::where('name_ar', 'like', '%' . $row[2] . '%')->orWhere('name_en', 'like', '%' . $row[2] . '%')->first();
                if ($category && $brand) {
                    $product = Product::create([
                        'parent_id' => $category->id,
                        'brand_id' => $brand->id,
                        'product_code' => $row[3],
                        'type' => $row[5] == 'combination' ? $row[5] : 'simple',
                        'name_ar' => $row[6],
                        'name_en' => $row[7],
                        'desc_ar' => $row[8],
                        'desc_en' => $row[9],
                        'short_desc_ar' => $row[10],
                        'short_desc_en' => $row[11],
                        'product_price1' => $row[12],
                        'product_price2' => $row[13],
                        'product_price3' => $row[14],
                        'product_price4' => $row[15],
                        'product_price' => $row[16],
                        'product_quantity' => $row[17],
                        'status' => '0',
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
