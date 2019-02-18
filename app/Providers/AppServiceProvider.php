<?php

namespace App\Providers;

use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //  migrate için
        Schema::defaultStringLength(191);

        setlocale(LC_TIME, $this->app->getLocale());  // ya da tr_TR.utf8
        Carbon::setLocale($this->app->getLocale());
            // Carbon sınıfının import etmeyi unutma

        if (!Session::has('settings')) {
            $settings= \App\Setting::first();
            Session::push('settings', [
                'homeTitle' => $settings->homeTitle,
                'postInCategoryPaginate' => $settings->postInCategoryPaginateCount,
                'postInHomePaginate' => $settings->postInHomePaginateCount,
                'tagPostsPaginate' => $settings->postInTagPaginateCount,
                'commentInPostCount' => $settings->commentInPostCount,
                'defaultCommentStatus' => $settings->commentDefaultStatus,
                'defaultPostImage' => $settings->postDefaultImage,
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
