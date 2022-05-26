<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\ProductFeatureModule\Entities\Attribute;
use Modules\ProductFeatureModule\Entities\Brand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;



class BrandsImport implements ToCollection, WithStartRow
{

     public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Brand::create([
                // 'id' => $row[0],
                'name_ar' => $row[1],
                'name_en' => $row[2],
                'photo'=> $row[3],
                'sort_order'=> $row[4],
            ]);
        }
    }
        public function startRow(): int
    {
        return 2;
    }
}
