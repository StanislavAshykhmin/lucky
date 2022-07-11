<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->activeRoute();
    }

    private function activeRoute()
    {
        Blade::directive('routeactive', function ($expression) {
            return "<?php echo Route::currentRouteName() == ${expression} ? 'active' : ''; ?>";
        });
    }
}
