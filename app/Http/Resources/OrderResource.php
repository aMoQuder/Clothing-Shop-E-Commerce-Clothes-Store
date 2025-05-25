<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => $this->user->name ?? 'غير معروف',
            'total_price' => $this->total_price,
            'status' => $this->status,
            'items' => $this->items->map(function($item) {
                return [
                    'product_name' => $item->product->name ?? 'محذوف',
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'size' => $item->size,
                    'color' => $item->color,
                ];
            }),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }

}
