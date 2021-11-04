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
        view()->composer('admin.includes.sidebar', function ($view) {
            $view->with('postCount', \App\Models\Post::all()->count());
        });
        view()->composer('admin.includes.sidebar', function ($view) {
            $view->with('vocalCount', \App\Models\Vocal::all()->count());
        });
        view()->composer('admin.includes.sidebar', function ($view) {
            $view->with('songCount', \App\Models\Song::all()->count());
        });
        view()->composer('admin.includes.sidebar', function ($view) {
            $view->with('userCount', \App\Models\User::all()->count());
        });
        view()->composer('admin.includes.sidebar', function ($view) {
            $view->with('pendingCount', \App\Models\Song::where('is_approved', false)->count());
        });
        view()->composer('admin.includes.sidebar', function ($view) {
            $view->with('originalCount', \App\Models\OriginalSong::all()->count());
        });
        view()->composer('admin.includes.sidebar', function ($view) {
            $view->with('tutorialCount', \App\Models\Tutorial::all()->count());
        });
    }
}
