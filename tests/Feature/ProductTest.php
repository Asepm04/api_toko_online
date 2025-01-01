<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetProduct()
    {

        $this->withHeaders(["Authorization" =>" Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTczNTczNTUyMywiZXhwIjoxNzM1NzM5MTIzLCJuYmYiOjE3MzU3MzU1MjMsImp0aSI6Ilo4Rk5HUFB2eU54MHd2cmMiLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.iXSYNU26Bh2zvlusY5rUxkGXRZwjNsVyHoH2o41SbXM" ])
        ->get("api/product/get")
        ->assertStatus(200)
        ->assertJson(["ok"=>"ok"]);
    }

    public function testGetProductFailed()
    {
        $this->withHeaders(["Authorization" =>"" ])
        ->get("api/product/get")
        ->assertStatus(401)
        ->assertJson(["error"=>"the token is'nt invalid"]);
    }

    public function testGetProductFailed2()
    {
        $this->withHeaders(["Authorization" =>"werejk4h98jkhggtyftyfydrtdtdutftuty" ])
        ->get("api/product/get")
        ->assertStatus(401)
        ->assertJson(["error"=>"the token is'nt invalid"]);
    }

    //test policy get Product (view)

    public function testGet()
    {
        $user = User::where("email","yadi2@com")->first();
        Auth::login($user);



    }
}
