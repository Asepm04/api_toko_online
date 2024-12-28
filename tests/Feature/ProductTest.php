<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testGetProduct()
    {
        $this->withHeaders(["Authorization" =>"Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTczNTM5NDI0MSwiZXhwIjoxNzM1Mzk3ODQxLCJuYmYiOjE3MzUzOTQyNDEsImp0aSI6IlA0OE4wemtnYzBmM2ZnZGYiLCJzdWIiOiIyIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.NjtXjyjrt0Z3dgaSR6BJZFUKiwyk33ijwEt2lFm3jGI" ])
        ->get("api/product/get")
        ->assertStatus(200)
        ->assertJson(["ok"=>"ok"]);
    }

    public function testGetProductFailed()
    {
        $this->withHeaders(["Authorization" =>"" ])
        ->get("api/product/get")
        ->assertStatus(401)
        ->assertJson(["error"=>"the token is'nt provided"]);
    }

    public function testGetProductFailed2()
    {
        $this->withHeaders(["Authorization" =>"werejk4h98jkhggtyftyfydrtdtdutftuty" ])
        ->get("api/product/get")
        ->assertStatus(401)
        ->assertJson(["error"=>"the token is'nt provided"]);
    }
}
