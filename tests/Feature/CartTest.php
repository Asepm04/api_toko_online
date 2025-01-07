<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testAdd()
    {
        $this->withHeaders(["Authorization"=>"Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTczNjE3NDkzNCwiZXhwIjoxNzM2MTc4NTM0LCJuYmYiOjE3MzYxNzQ5MzQsImp0aSI6ImdNazhwdmFSa3JHbXpvN1kiLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.2g99poU5TPHwem1QVNpb-wUL2KFd0hTXB0lTU6XtfYU"])
        ->get("api/cart/product/6")
        ->assertStatus(200)
        ->assertJson(['']);

    }
    public function testGet()
    {
        $this->withHeaders(["Authorization"=>"Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTczNjI1OTI0OSwiZXhwIjoxNzM2MjYyODQ5LCJuYmYiOjE3MzYyNTkyNDksImp0aSI6IjhjVEVwUVVZZTFVRjBwbnQiLCJzdWIiOiIxIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.O8XdVaUOpWFSWPW60D5qe4RWFD_NSKVRJ4MuNqTKEvg"])
        ->get("api/cart/product")
        ->assertStatus(200)
        ->assertJson(['']);

    }
}
