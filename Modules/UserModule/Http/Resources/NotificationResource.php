<?php

namespace Modules\UserModule\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request
     * @return array
     */

    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => app()->isLocale('en') ? ($this->data['title_en'] ?? '') : ($this->data['title_ar'] ?? ''),
            'body' => app()->isLocale('en') ? ($this->data['body_en'] ?? '') : ($this->data['body_ar'] ?? ''),
            'url' => $this->data['url'] ?? '#',
            'created_at' => $this->created_at->format('Y-m-d H-i-s'),
            'updated_at' => $this->updated_at->format('Y-m-d H-i-s'),
            'data' => $this->data,
        ];
    }
}
