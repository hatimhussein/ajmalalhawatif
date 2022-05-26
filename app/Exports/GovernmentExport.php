<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Modules\AreaModule\Entities\Government;


class GovernmentExport implements FromCollection,ShouldAutoSize,WithHeadings,WithMapping
{

        public function collection()

    {
      return Government::all(); 
    }
   
     public function headings(): array
    {
        return [
            '#',
            'الاسم بالانجليزيه',
            'الاسم بالعربية',
            ' الدولة',
            'created_at',
            'updated_at',
        ];
    }
  public function map($government): array
    {
        return [
            $government->id,
            $government->name_en,
            $government->name_ar,
            $government->country->name_en,
            $government->created_at,
            $government->updated_at,
           
         ]; 
     }
}
