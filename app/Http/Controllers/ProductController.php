<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Resources\ProductCollection;

class ProductController extends Controller
{
    public function get()
    {

            $product = Product::get();

            return  new ProductCollection($product);

    }


}
