<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            "seller" => Auth::user()->name,
           "id"=> $this->id,
           "name"=> $this->name_product,
           "kategori"=> $this->kategori,
           "stock"=> $this->stock,
            "price"=> $this->price,
            "image"=>asset('storage/image/'.$this->image),
            "cart"=>url("api/cart/product/".$this->id)
            
        ];
    }
}
