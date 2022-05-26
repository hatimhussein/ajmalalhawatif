<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Modules\AreaModule\Entities\Country;


class CountriesExport implements FromCollection,ShouldAutoSize,WithHeadings
{

        public function collection()

    {
      return Country::all(); 
    }
     public function headings(): array
    {
        return [
            '#',
            'الاسم بالعربية',
            'الاسم بالانجليزيه',
             ' phone_code',
            ' code',
             ' photo',
            'created_at',
            'updated_at',
        ];
    }
}
