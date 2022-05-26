<?php

namespace Modules\ProductModule\Transformers;

use App;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request
     * @return array
     */

         public function toArray($request)
         {
             return [
                 'products' => $this->collection->transform(function($product){
                     return [
                       'id' => $product->id,
                       'product_price' => $product->product_price,
                       'name' => (App::getLocale()=='en')?$product->name_en:$cat->name_ar,
                       'product_photo' => $product->product_photo,
                       'discounts' => $product->discounts,
                       'images' => $product->images,
                       'new_discount' => $product->images,



                     ];


                 }),

             ];
         }
}
