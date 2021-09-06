<?php

namespace Tests\Unit;

use App\Models\User as MUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class User extends TestCase
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
    public function only_name_and_password()
    {
        MUser::create(["name"=>"someName","password"=>"somePassword"]);
        $this->assertCount(2, MUser::all());

        $this->assertTrue(false);
    }
    
    public function database_has_some_name(){
        $this->assertDatabaseHas('users', ['name'=>'someName']);
    }
}
