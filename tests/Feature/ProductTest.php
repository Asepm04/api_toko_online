<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Http\UploadedFile;

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

    public function testGetProductById()
    {
        //ambil id dari id product 
        $this->withHeaders(["Authorization" =>" Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTczNjE3NDkzNCwiZXhwIjoxNzM2MTc4NTM0LCJuYmYiOjE3MzYxNzQ5MzQsImp0aSI6ImdNazhwdmFSa3JHbXpvN1kiLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.2g99poU5TPHwem1QVNpb-wUL2KFd0hTXB0lTU6XtfYU"])
        ->get("api/product/get/23")
        ->assertStatus(200)
        ->assertJson(["ok"=>"ok"]);


    }

    public function testUpdate()
    {
        $this->withHeaders(["Authorization" =>" Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTczNTczNTUyMywiZXhwIjoxNzM1NzM5MTIzLCJuYmYiOjE3MzU3MzU1MjMsImp0aSI6Ilo4Rk5HUFB2eU54MHd2cmMiLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.iXSYNU26Bh2zvlusY5rUxkGXRZwjNsVyHoH2o41SbXM" ])
        ->get("api/product/update/1")
        ->assertStatus(200)
        ->assertJson(["ok"=>"ok"]);
    }

    public function testCreateProduct()
    {
        $this->withHeaders(["Authorization"=> "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTczNTgyNTQ4OCwiZXhwIjoxNzM1ODI5MDg4LCJuYmYiOjE3MzU4MjU0ODgsImp0aSI6IlFxa3lzTFAzQmxEWm9ESTEiLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.KqZHJ13o2bWkdlIhxEO3G0Uvb4UF0cWEXPNMxSGZS4Q"])
        ->post("api/product/create",[
            "name_product"=>"celana chino",
            "kategori"=>"celana",
            "stock"=>"100",
            "price"=>"100000",
            "image"=>UploadedFile::fake()->create("celana1.txt")
        ])
        ->assertStatus(201)
        ->assertJson(["message"=>"success"]);
    }
    public function testCreateProductFailed()
    {
        $this->withHeaders(["Authorization"=> "Bearer "])
        ->post("api/product/create",[
            "name_product"=>"celana chino",
            "kategori"=>"celana",
            "stock"=>"100",
            "price"=>"100000",
            "image"=>UploadedFile::fake()->create("celana1.txt")
        ])
        ->assertStatus(401)
        ->assertJson(["error"=>"the token is'nt invalid"]);
    }

    public function testCreateProductNotVaidated()
    {
        $this->withHeaders(["Authorization"=> "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTczNTgyNTQ4OCwiZXhwIjoxNzM1ODI5MDg4LCJuYmYiOjE3MzU4MjU0ODgsImp0aSI6IlFxa3lzTFAzQmxEWm9ESTEiLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.KqZHJ13o2bWkdlIhxEO3G0Uvb4UF0cWEXPNMxSGZS4Q"])
        ->post("api/product/create",[
            "name_product"=>"",
            "kategori"=>"",
            "stock"=>"100",
            "price"=>"100000",
            "image"=>UploadedFile::fake()->create("celana1.txt")
        ])
        ->assertStatus(400)
        ->assertJson([
            ["name_product"=>["The name product field is required."],
            "kategori"=>["The kategori field is required."]]
        
        ]);
    }
}
