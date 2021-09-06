<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class Subscription extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function save_subscription(){
        $user=["name"=>"someName","password"=>"somePassword"];
       
        $this->post(route("/signup", $user))
        ->assert(201);
    }

}
