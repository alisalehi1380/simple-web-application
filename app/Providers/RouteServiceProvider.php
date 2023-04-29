<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
//    public const HOME = '/home';

    public const DASHBOARD_ADMIN = '/admin/panel';

    public const DASHBOARD_USER = '/user/panel';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();


        $this->routes(function () {
            $this->api();
            $this->website();
            $this->authWeb();
            $this->panel();
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
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    private function api()
    {
        return
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api/auth/auth.php'));
    }

    private function website()
    {
        return
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
    }

    private function authWeb()
    {
        return
            Route::middleware('web')
                ->group(base_path('routes/Auth/auth.php'));
    }

    private function panel()
    {
        return
            Route::middleware('web')
                ->group(base_path('routes/Panel/userPanel.php'));
    }

}
