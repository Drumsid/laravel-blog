<?php

namespace App\Providers;

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
        view()->composer('admin.includes.sidebar', function ($view) {
            $view->with('categoryCount', \App\Models\Category::all()->count());
        });
        view()->composer('admin.includes.sidebar', function ($view) {
            $view->with('tagCount', \App\Models\Tag::all()->count());
        });
    }
}
