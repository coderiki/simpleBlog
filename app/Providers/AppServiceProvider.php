<?php

namespace App\Providers;

use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
