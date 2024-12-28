<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function get()
    {
        //bikin policy besok !!!

        if(Gate::allows("view",$user))
        {}
        return response()->json(['ok'=>'ok'],200);
    }


}
