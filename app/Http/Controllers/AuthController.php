<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Signup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   
    public function signup(Signup $request){
      
       $user= User::create([
            "name" => $request->validated()['name'],
            "password" => bcrypt($request->validated()['passwords']),
        ]);
        return response( $this->userResponse($user), 201);
    }

    public function login(Login $req){
        if(!Auth::attempt($req->validated())){
            $resp= "Invalid credentials";
            return response(["message"=>$resp],401);
        }
        return response($this->userResponse(auth()->user()),200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return ["message"=> "Logged Out"];
    }

    private function userResponse(User $user){
        $response = [
            "user"=>$user,
            "token"=>$user->createToken("myAppToken")->plainTextToken
        ];
       return $response;
    }
    
}
