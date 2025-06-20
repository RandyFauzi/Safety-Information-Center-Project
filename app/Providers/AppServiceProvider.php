<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
// use App\Helpers\ViewHelpers;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('sortlink', function ($expression) {
            return "<?php echo \App\Helpers\ViewHelpers::sortLink($expression); ?>";
        });
    }
}



