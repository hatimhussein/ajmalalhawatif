<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\ProductFeatureModule\Entities\Attribute;
use Modules\AreaModule\Entities\Government;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\AreaModule\Entities\Country;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GovernmentImport implements ToCollection,WithStartRow
{
    // public function collection(Collection $rows)
    // {
  
    // }
     public function collection(Collection $rows)
    {

        foreach ($rows as $row) 
        {
             $country = Country::where('name_ar', 'like', '%' . $row[3] . '%')->orWhere('name_en', 'like', '%' . $row[3] . '%')->first();
             if($country){
            Government::create([
                'id' => $row[0],
                'name_en' => $row[1],
                'name_ar' => $row[2],
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
