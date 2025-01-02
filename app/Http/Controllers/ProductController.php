<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Product;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductController extends Controller
{
    public function get()
    {

            $product = Product::get();

            return  new ProductCollection($product);

    }

    public function getById($id)
    {
        $product = Product::find($id);
       // Log::info(json_encode(Auth::user())); hsilnya sama saja
        Log::info(json_encode(Auth('api')->user()));
        return new ProductResource($product);
        
    }

    public function create(ProductRequest $request)
    {
       $data = $request->validated();

       if(!$data)
       {
         throw new HttpResponseException(
            response()->json(["error"=>"Unvalidated"],400)
         );
       }
       $data["image"]->storePubliclyAs("image",$data["image"]->getClientOriginalName(),"public");
       $data["image"]=$data["image"]->getClientOriginalName();
       $data["user_id"] = Auth::user()->id;
       $product =  Product::create($data);

       return response()->json(["message"=>"success"],201);
    }


}
