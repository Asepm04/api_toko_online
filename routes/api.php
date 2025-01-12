<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("/register",[App\Http\Controllers\AuthController::class,'register']);

Route::group(['middleware' => 'api'], function () {

    Route::post('login', [App\Http\Controllers\AuthController::class,'login']);
    Route::post('logout', [App\Http\Controllers\AuthController::class,'logout']);
    Route::post('refresh', [App\Http\Controllers\AuthController::class,'refresh']);
    Route::post('me', [App\Http\Controllers\AuthController::class,'me']);
    
});

Route::middleware(['jwtVerify']
)->controller(App\Http\Controllers\ProductController::class)->prefix("product")->group(function()
{
    Route::get("get","get");
    Route::get("get/{id}","getById");
    Route::patch("update/{id}","update");
    Route::post("create","create");
});

Route::middleware(['jwtVerify'])->controller(App\Http\Controllers\CartModelController::class)->prefix("cart")->group(function()
{
    Route::get("product/{id}","add");
    Route::get("product/","get");
    Route::get("product/delete/{id}","delete")->where('id','[0-9]+');
    Route::fallback("product/delete",function()
        {
            return response()->json(["message"=>"ups not found"],404);
        });
});