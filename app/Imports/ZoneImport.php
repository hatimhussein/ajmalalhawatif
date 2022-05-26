<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\ProductFeatureModule\Entities\Attribute;
use Modules\AreaModule\Entities\Government;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\AreaModule\Entities\Country;
use Modules\AreaModule\Entities\City;
use Modules\AreaModule\Entities\Zone;
use Maatwebsite\Excel\Concerns\WithStartRow;
class ZoneImport implements ToCollection,WithStartRow
{
    // public function collection(Collection $rows)
    // {
  
    // }
     public function collection(Collection $rows)
    {

        foreach ($rows as $row) 
        {
                 $city = City::where('name_ar', 'like', '%' . $row[3] . '%')->orWhere('name_en', 'like', '%' . $row[3] . '%')->first();
                $government = Government::where('name_ar', 'like', '%' . $row[4] . '%')->orWhere('name_en', 'like', '%' . $row[4] . '%')->first();
                  $country = Country::where('name_ar', 'like', '%' . $row[5] . '%')->orWhere('name_en', 'like', '%' . $row[5] . '%')->first();
             if($city && $country && $government){
            Zone::create([
                // 'id' => $row[0],
                'name_en' => $row[1],
                'name_ar' => $row[2],
                'city_id' =>  $city->id,
                'government_id'=>$government->id,
                'country_id'=> $country->id,
               
               
            ]);
        }
        }
    }
           public function startRow(): int
    {
        return 2;
    }
}
