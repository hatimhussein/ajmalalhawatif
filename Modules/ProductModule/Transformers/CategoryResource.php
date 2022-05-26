<?php

namespace Modules\ProductModule\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request
     * @return array
     */
    // public function toArray($request)
    // {
    //     return parent::toArray($request);
    // }

    public function toArray($request)
     {

      return [
           'id' => $this->name_ar,
           'parent_id' => $this->parent_id,
           "photo" => asset('public/images/category/'.$this->photo),
           'ar' => $this->translate('ar'),
           'en' => $this->translate('en'),
         ];
     }
}
