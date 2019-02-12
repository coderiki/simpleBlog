<?php

namespace App\Providers;

use App\Contracts\CommentContract;
use App\Http\Repositories\Eloquent\CommentRepository;
use Illuminate\Support\ServiceProvider;

class CommentRepositoryProvider extends ServiceProvider
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
        $this->app->singleton(CommentContract::class, CommentRepository::class);
    }
}
