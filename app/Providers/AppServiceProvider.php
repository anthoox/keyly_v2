<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Category;
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
        Schema::defaultStringLength(191);

        View::composer('layouts.sidebar', function ($view) {
            $view->with('categories', Category::all());
        });

        
        View::composer(['components.layouts.app.sidebar', 'dashboard'], function ($view) {
            $view->with('categories', Category::all());
        });
    }
}
