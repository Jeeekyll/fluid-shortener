<?php

namespace App\Providers;

use App\Repositories\LinkRepository;
use App\Repositories\LinkRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(LinkRepositoryInterface::class, LinkRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
