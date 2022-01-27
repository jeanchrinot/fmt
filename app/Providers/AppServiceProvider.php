<?php

namespace App\Providers;

use App\Social;
use App\Gallery;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $footer_galleries = Gallery::where('featured',true)->take(6)->get();
        $socials = Social::where('id',1)->firstOrFail();
        View::share('footer_galleries', $footer_galleries);
        View::share('socials', $socials);

        Blade::directive('format_date', function ($expression) {
            return "<?php echo ($expression)->format('d/m/Y H:i'); ?>";
        });
    }
}
