<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
   public function testLoginUser()
   {
     $this->post("api/login",["email"=>"yadi2@com","password"=>"12345678"])
     ->assertJson([
        'access_token' => '',
        'token_type' => 'bearer',
        'expires_in' => '3600'
    ])
    ->assertStatusOK();
   }

   public function testFailedLogin()
   {
    $this->post("api/login",["email"=>"a@com","password"=>"ioilsj"])
    ->assertJson(["error"=>"Unauthorized"])
    ->assertStatus(401);
   }

   public function testLogoutSuccess()
   {
    $this->withHeaders(["Authorization"=>"Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTczNTMxMDczNiwiZXhwIjoxNzM1MzE0MzM2LCJuYmYiOjE3MzUzMTA3MzYsImp0aSI6IkY3MDE1eTIxQzgxTTVQY3oiLCJzdWIiOiIyIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.QG8SFzDulg4EP966LTX95_CFUiZdqV7LGXoXgL57OdI"])
    ->post("api/logout",[])
    ->assertJson([]);
   }

   public function testWrongToken()
   {
    $this->withHeaders(["Authorization"=>"Bearer eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L2FwaS9sb2dpbiIsImlhdCI6MTczNTMxMDczNiwiZXhwIjoxNzM1MzE0MzM2LCJuYmYiOjE3MzUzMTA3MzYsImp0aSI6IkY3MDE1eTIxQzgxTTVQY3oiLCJzdWIiOiIyIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.QG8SFzDulg4EP966LTX95_CFUiZdqV7LGXoXgL57OdI"])
    ->post("api/logout",[])
    ->assertJson([]);
   }
}
