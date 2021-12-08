<?php

namespace Sil2\Vidflex\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $return = [];
        if ($this->is_draft == 0) {
            $return['order_id'] = $this->id;
        }
        $return['items'] = OrderItemResource::collection($this->items);

        return $return;
    }
}
