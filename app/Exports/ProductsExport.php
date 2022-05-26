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
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, ShouldAutoSize, WithHeadings, WithMapping
{
    use Exportable;

    public function collection()

    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            '#',
            'القسم',
            'الماركة',
            'كود المنتج',
            'الحالة',
            'النوع',
            'الاسم بالعربية',
            'الاسم بالانجليزية',
            'الوصف بالعربية',
            'الوصف بالانجليزية',
            'وصف مختصر بالعربية',
            'وصف مختصر بالانجليزية',
            'سعر عميل خاص',
            'سعر موزع منطقة',
            'سعر صاحب متجر',
            'سعر متجر الكترونى',
            'سعر عميل نهائي',
            'الكمية',
            'الطول',
            'العرض',
            'الطول',
            'طول الطبقة',
            'الوزن',
            'فئة الوزن',
            'الفيديو',
            'فيديو يوتيوب',
            'الصورة الرئيسية',
            'الصور الثانوية',
        ];
    }

    public function map($Product): array
    {
        $images = [];
        foreach ($Product->images as $image){
            $images [] = url('images/product/' . $image->image) . ', ';
        }

        return [
            $Product->id,
            $Product->category->name_ar,
            $Product->brand->name_ar,
            $Product->product_code,
            $Product->status,
            $Product->type,
            $Product->name_ar,
            $Product->name_en,
            $Product->desc_ar,
            $Product->desc_en,
            $Product->short_desc_ar,
            $Product->short_desc_en,
            $Product->product_price,
            $Product->product_price1,
            $Product->product_price2,
            $Product->product_price3,
            $Product->product_price4,
            $Product->product_quantity,
            $Product->length,
            $Product->width,
            $Product->height,
            $Product->length_class,
            $Product->weight,
            $Product->weight_class,
            $Product->video,
            $Product->yt_video,
            url('images/product/' . $Product->product_photo),
            $images,
        ];
    }
}
