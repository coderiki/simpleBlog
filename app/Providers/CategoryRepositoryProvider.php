<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use App\Http\Repositories\Eloquent\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class CategoryRepositoryProvider extends ServiceProvider
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
        $this->app->singleton(CategoryContract::class, CategoryRepository::class);
    }
}
