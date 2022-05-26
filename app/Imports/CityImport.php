<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\ProductFeatureModule\Entities\Attribute;
use Modules\AreaModule\Entities\Government;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\AreaModule\Entities\Country;
use Modules\AreaModule\Entities\City;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CityImport implements ToCollection, WithStartRow
{
    // public function collection(Collection $rows)
    // {
  
    // }
     public function collection(Collection $rows) 
    {

        foreach ($rows as $row) 
        {
           
                $government = Government::where('name_ar', 'like', '%' . $row[3] . '%')->orWhere('name_en', 'like', '%' . $row[3] . '%')->first();
                  $country = Country::where('name_ar', 'like', '%' . $row[4] . '%')->orWhere('name_en', 'like', '%' . $row[4] . '%')->first();
             if($country && $government){
            City::create([
                // 'id' => $row[0],
                'name_en' => $row[1],
                'name_ar' => $row[2],
                'government_id'=>$government->id,
                'country_id'=> $country->id,
                'shipping_price'=>$row[5]
               
               
            ]);
        }
        }
    }
        public function startRow(): int
    {
        return 2;
    }
}
