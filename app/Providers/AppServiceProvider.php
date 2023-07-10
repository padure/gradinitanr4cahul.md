<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Gallery;
use App\Models\Setting;

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
        $lastPhotos     = Gallery::latest()->take( config('site.image_limit') )->get();
        $settings       = Setting::get()->last();
        View::share('lastPhotos', $lastPhotos);
        View::share('settings', $settings);
    }
}
