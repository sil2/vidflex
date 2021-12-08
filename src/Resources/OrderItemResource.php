<?php

namespace Sil2\Vidflex\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "label" => $this->product->label,
            "type" => $this->product->type->name,
            "category" => $this->product->category->label,
            "quantity" => $this->quantity,
            "price" => $this->price,
            "attributes"=> ProductAttributeResource::collection($this->product->attributes)
        ];

    }
}
