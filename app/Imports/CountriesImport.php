<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\ProductFeatureModule\Entities\Attribute;
use Modules\AreaModule\Entities\Country;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class CountriesImport implements ToCollection , WithStartRow
{
    // public function collection(Collection $rows)
    // {
  
    // }
     public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Country::create([
                // 'id' => $row[0],
                'name_en' => $row[1],
                'name_ar' => $row[2],
                'phone_code'=> $row[3],
                'code'=> $row[4],
                 'photo'=> $row[4],
               
            ]);
        }
    }
        public function startRow(): int
    {
        return 2;
    }
}
