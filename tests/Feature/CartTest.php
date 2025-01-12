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
        $this->withHeaders(["Authorization"=>"Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTczNjY4OTgzNiwiZXhwIjoxNzM2NjkzNDM2LCJuYmYiOjE3MzY2ODk4MzYsImp0aSI6Ik1sQ2xmamNsY1p4Zkt5ZkkiLCJzdWIiOiIyIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.hAKQNj258L3xi6UavsyWiciH54wNQjRfoTKH8AkGCqY"])
        ->get("api/cart/product")
        ->assertStatus(200)
        ->assertJson(['']);

    }
}
