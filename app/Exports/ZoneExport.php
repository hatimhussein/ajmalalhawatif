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
use Modules\AreaModule\Entities\Zone;
use Maatwebsite\Excel\Concerns\WithMapping;

class ZoneExport  implements FromCollection,ShouldAutoSize,WithHeadings,WithMapping
{

        public function collection()

    {
      return Zone::all(); 
    }
     public function headings(): array
    {
        return [
            '#',
            'الاسم بالانجليزيه',
            'الاسم بالعربية',
             'الاسم  المدينة',
             'المنطقة',
            ' الدولة',
            'created_at',
            'updated_at',
        ];
    }
    public function map($Zone): array
    {
        return [
            $Zone->id,
            $Zone->name_en,
            $Zone->name_ar,
            $Zone->city->name_en,
            $Zone->government->name_en,
            $Zone->country->name_en,
            $Zone->created_at,
            $Zone->updated_at,
           
           
         ]; 
     }

}
