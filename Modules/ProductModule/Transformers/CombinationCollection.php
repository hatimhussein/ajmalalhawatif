<?php

namespace Modules\ProductModule\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CombinationCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($result) {
                return [
                    'follow_option' => $result,
                ];
            }),
        ];
    }
}
