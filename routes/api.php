<?php

use App\Http\Controllers\AuthController;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/users', function () {
    return response(User::all());
});//->middleware("throttle:for_entire_system");

/** with rate limiting */
/*
Route::group(['middleware'=>
   'throttle:for_entire_system'
], function () {
 Route::post('/signup', 'AuthController@signup');
 Route::post('/login', 'AuthController@login');
});
*/


 Route::post('/signup', 'AuthController@signup');
 Route::post('/login', 'AuthController@login');
 Route::group(['middleware' => [
    'auth:sanctum'
    ]
], function () {
Route::post("/subscribe", 'SubscriptionController@store');
Route::put("/change/subscription/{id}", 'SubscriptionController@update');
Route::get('/subscriptions', 'SubscriptionController@index');

});
/*
private endpoint with throttling
Route::group(['middleware' => [
        'auth:sanctum',
        "throttle:per_month",
        'throttle:for_entire_system',
        'throttle:per_second'
        ]
], function () {
    Route::post("/subscribe", 'SubscriptionController@store');
    Route::put("/change/subscription/{id}", 'SubscriptionController@update');
 
});
*/
