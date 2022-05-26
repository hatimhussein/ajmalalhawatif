<?php

namespace Modules\ProductModule\Transformers;

use App;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request
     * @return array
     */


    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($cat) {
                return [
                    'id' => $cat->id,
                    'name' => (App::getLocale() == 'en') ? $cat->name_en : $cat->name_ar,
                    'photo' => $cat->photo,
                    'child' => $cat->child->transform(function ($child) {
                        return [
                            'id' => $child->id,
                            'child_name' => (App::getLocale() == 'en') ? $child->name_en : $child->name_ar,
                        ];
                    }),
                    'brands' => $cat->brands
                ];
            }),
        ];
    }
}
