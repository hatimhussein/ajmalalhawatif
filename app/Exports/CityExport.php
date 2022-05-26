<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Modules\AreaModule\Entities\Government;
use Modules\AreaModule\Entities\Country;
use Modules\AreaModule\Entities\City;
use Maatwebsite\Excel\Concerns\WithMapping;

class CityExport implements FromCollection,ShouldAutoSize,WithHeadings,WithMapping
{

        public function collection()

    {
      return City::all(); 
    }
     public function headings(): array
    {
        return [
            '#',
            'الاسم بالانجليزيه',
            'الاسم بالعربية',
             'المنطقة',
            ' الدولة',
            'created_at',
            'updated_at',
            'سعر الشحن',
        ];
    }

public function map($City): array
    {
        return [
            $City->id,
            $City->name_en,
            $City->name_ar,
            $City->government->name_en,
            $City->country->name_en,
            $City->created_at,
            $City->updated_at,
            $City->shipping_price,
           
         ]; 
     }
}
