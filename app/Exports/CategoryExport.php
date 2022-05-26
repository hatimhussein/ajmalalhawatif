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
use Modules\ProductModule\Entities\Category;
use Maatwebsite\Excel\Concerns\WithMapping;

class CategoryExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{

    public function collection()
    {
        return Category::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'القسم',
            'الاسم بالانجليزيه',
            'الاسم بالعربية',
            'الوصف بالعربية',
            ' الوصف بالانجليزيه',
            'الصورة',
            'الحالة',
            'created_at',
            'updated_at',
            'الظهور ف الرئيسية',
            'ترتيب الظهور',


        ];
    }

    public function map($Category): array
    {


        // if(isset($Category['parent_id'])){
        //     $parent_id='-';
        // }
        // else{
        //   $parent_id=$Category->parent['name_ar'];
        // }
        return [
            $Category->id,
            isset($Category->parent_id) ? $Category->parent['name_ar'] : '-',
            $Category->name_en,
            $Category->name_ar,
            $Category->desc_ar,
            $Category->desc_en,
            $Category->photo,
            $Category->status,
            $Category->created_at,
            $Category->updated_at,
            $Category->in_home_page,
            $Category->sort_order,

        ];
    }

}
