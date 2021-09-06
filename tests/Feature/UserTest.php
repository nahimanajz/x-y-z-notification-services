<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
   
    public function testUserIsCreatedSuccessfully() {
    
        $payload = [
            'name' => "someName2",
            'password'  => bcrypt("password"),         
        ];
        $this->json('post', '/api/signup', $payload)
             ->assertStatus(HttpResponse::HTTP_CREATED);
    }
    public function testUserIsNotAuthorised() {    
        $payload = [
            'name' => "someName2",
            'password'  => "password",         
        ];
        $this->json('post', '/api/login', $payload)
             ->assertStatus(HttpResponse::HTTP_UNAUTHORIZED);
    }

    public function testUserShouldNotSignupOrLoginIfUserNameIsMissing() {    
        $payload = [
            'password'  => "password",         
        ];
        $this->json('post', '/api/signup', $payload)
             ->assertStatus(422);
              $this->json('post', '/api/login', $payload)
             ->assertStatus(422);
    }
    public function testUserShouldNotSignupOrLoginIfPasswordIsMissing() {    
        $payload = [           
            "name"   =>"John"     
        ];
        $this->json('post', '/api/signup', $payload)
             ->assertStatus(422);
        $this->json('post', '/api/login', $payload)
        ->assertStatus(422);
    }
}
