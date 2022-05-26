<?php

namespace Modules\ProductFeatureModule\Repository;


use Illuminate\Support\Facades\DB;
use Modules\ProductFeatureModule\Entities\Brand;

class BrandRepository
{

    function findBrandById($id)
    {
        return Brand::find($id);
    }

    function findAllBrands()
    {
        return Brand::all();
    }

    function saveBrand($category_data)
    {
        return Brand::create($category_data);
    }


    function updateBrand($category, $data)
    {
        return $category->update($data);
    }


    function deleteBrand($id)
    {
        $valid = $this->dosnotHaveProductsAndChildern($id);
        if ($valid)
            return $valid->delete();
    }


    public function bulkStatus($ids, $status)
    {
        return Brand::whereIn('id', $ids)->update(['status' => $status]);
    }
}
