<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Member;
use App\Post;
use App\Activity;
use App\Phototitle;
use App\Responsible;
use App\Category;
use App\University;


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
        View::share('count_photo', Phototitle::count());
        View::share('count_res', Responsible::count());
        View::share('count_uni', University::count());
    }
}
