<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
               ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
          
        });

        RateLimiter::for('per_second', function (Request $request) {
           return Limit::perMinute(4)->by($request->ip())->response(function(){
               return response()->json([
                 'response' => 'failed',
                 'message' => 'Too many request has been made',
               ], 429);
           });
        });

        RateLimiter::for('per_month', function (Request $request) {
            return Limit::perDay(10)->by($request->user()->id)->response(function(){
                return response()->json([
                  'response' => 'failed',
                  'message' => 'Too many request this month by '.auth()->user()->name,
                ], 429);
            });;
        });

        RateLimiter::for('for_entire_system', function (Request $request) {
             return Limit::perMinutes(4, 20)->by("")->response(function(){
                return response()->json([
                  'response' => 'failed',
                  'message' => 'Whole system encountered many requests',
                ], 429);
            });;
        });
    }
}
