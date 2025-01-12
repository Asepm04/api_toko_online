<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartModel;
use App\Http\Resources\CartResource;
use App\Http\Resources\CartCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Product;

class CartModelController extends Controller
{
    public function add($id)
    {
        $data = 
        [
            "user_id"=>Auth::user()->id,
            "product_id"=>$id
        ];

        if($id == null)
        {
            return response()->json(["error"=>"failed"],400);
        }

        if(!$data)
        {
            return response()->json(["error"=>"failed"],400);
        }
        $cart = CartModel::create($data);
        $cartt = CartModel::with('product')->where("id",Auth::user()->id)->get();
        return new CartCollection($cartt);
    }

    public function get()
    {
        // $cartt = CartModel::with('product')->where("id",Auth::user()->id)->get();
        // return new CartCollection($cartt);

        // $cartt = CartModel::with('product')->where("id",Auth::user()->id)->get();
        // return new CartResource($cartt);


        //success if use json without resource
        $cart = Auth::user()->cartItem()->with('product')->get();
        return response()->json(
            [
             $cart->map(function($item)
             {
              return $item->product->map(function($items)
               {
                return [
                    "id"=>$items->id,
                    "kategori"=> $items->kategori,
                    "name"=>$items->name_product,
                    "stock"=>$items->stock,
                    "price"=>$items->price,
                    "image"=>asset("storage/image/".$items->image),
                    "kuantitas"=>1,
                    "delete"=>url("api/cart/product/delete/".$items->id)
                ];
               });
             })
            ]);
    }

    public function delete($id)
    {
        if($id == null)
        {
            return response()->json(["error"=>"Unauthorized"],400);
        }

        $cart = CartModel::where("user_id",Auth::user()->id)->where("product_id",$id)->first();
        Log::info(json_encode(CartModel::where("user_id",Auth::user())->where("product_id",$id)->first()));

       if($cart)
       {
        $cart->delete();
        return response()->json(["message"=>"true"],200);

       }
       else{
        return response()->json(["error"=>"error",],404);
       }

    }
}
