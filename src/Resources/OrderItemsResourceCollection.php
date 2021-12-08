<?php

namespace Sil2\Vidflex\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderItemsResourceCollection extends ResourceCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            return [
                'id' => $item['id'],
                'label' => $item['product']['label'],
            ];
        });
    }
}
