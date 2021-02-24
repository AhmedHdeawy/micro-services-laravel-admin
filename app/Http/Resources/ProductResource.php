<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' =>  $this->title,
            'description' =>  $this->description,
            'image' =>  $this->image,
            'image_url' =>  $this->image_url,
            'price' =>  $this->price,
        ];
    }
}
