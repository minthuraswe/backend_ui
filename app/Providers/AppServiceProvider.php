<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Member;
use App\Post;
use App\Activity;
use App\Category;



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
        View::share('count_mem', Member::count());
        View::share('count_post', Post::count());
        View::share('count_act', Activity::count());
        View::share('count_cat', Category::count());
    }
}
