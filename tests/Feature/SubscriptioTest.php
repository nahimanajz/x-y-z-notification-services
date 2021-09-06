<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Subscription extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function testSaveSubscription(){
        //login, describe, change subscription
        $user =["name"=>"nhoiu","password"=>"password"];
        $data = [
            "subscribedOn"=>json_encode(["email"=>"basic", "sms"=>"premium"]), 
            "user_id"=>1
        ];
        
        $this->json('post', '/api/signup', $user)->assertStatus(201);
        $this->json('post','api/subscribe',$data)->assertStatus(201);
        $this->assertDatabaseHas("subscriptions",  $data);
    }

}
