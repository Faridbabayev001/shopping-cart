<?php

namespace App\Providers;

use App\Http\Repositories\V1\AuthRepository;
use App\Http\Repositories\V1\Contracts\AuthRepositoryInterface;
use App\Http\Repositories\V1\Contracts\ProductRepositoryInterface;
use App\Http\Repositories\V1\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);
       $this->app->bind(AuthRepositoryInterface::class,AuthRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
