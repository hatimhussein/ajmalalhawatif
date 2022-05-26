<?php

namespace App\Exports;

use Modules\ProductModule\Entities\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Modules\ProductFeatureModule\Entities\Attribute;
use Modules\ProductFeatureModule\Entities\Brand;
use Modules\ProductModule\Entities\Category;
use Modules\ProductModule\Entities\PoductAttribute;

class BrandsExport implements FromCollection,ShouldAutoSize,WithHeadings
{

        public function collection()

    {
      return Brand::all(); 
    }
     public function headings(): array
    {
        return [
            '#',
            'الاسم بالعربية',
            'الاسم بالانجليزيه',
             'الصورة ',
            'الترتيب ',
             'تاريخ الانشاء ',
            'تاريخ التعديل',
        ];
    }
}
