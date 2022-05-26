<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Modules\ProductFeatureModule\Entities\Attribute;
use Modules\AreaModule\Entities\Government;
use Maatwebsite\Excel\Concerns\ToModel;
use Modules\AreaModule\Entities\Country;
use Modules\AreaModule\Entities\City;
use Modules\ProductModule\Entities\Category;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CategoryImport  implements ToCollection, WithStartRow
{
    // public function collection(Collection $rows)
    // {
  
    // }
     public function collection(Collection $rows)
    {

        foreach ($rows as $row) 
        { 
          
              $category = Category::where('name_ar', 'like', '%' . $row[1] . '%')->orWhere('name_en', 'like', '%' . $row[1] . '%')->first();
              if($category)
                 $parent_id=$category->id;
             else
                 $parent_id = NULL;
              
            Category::create([
                // 'id' => $row[0],
                'parent_id'=>$parent_id,
                'name_ar' => $row[2],
                'name_en' => $row[3],
                'desc_ar' => $row[4],
                'desc_en' => $row[5],
                 // 'photo' => $row[6],
                'status'=> $row[6],
                'sort_order'=>$row[7]
               
               
            ]);
       
        }
    }
     public function startRow(): int
    {
        return 2;
    }
}
