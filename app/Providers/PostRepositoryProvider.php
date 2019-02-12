<?php

namespace App\Providers;

use App\Contracts\PostContract;
use App\Http\Repositories\Eloquent\PostRepository;
use Illuminate\Support\ServiceProvider;

class PostRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PostContract::class, PostRepository::class);
        /*
         * PostContract çağrıldığında Eloquent altındaki PostRepository nin
         * default olarak çağrılmasını service provider ile tanımladık.
         */
    }
}
