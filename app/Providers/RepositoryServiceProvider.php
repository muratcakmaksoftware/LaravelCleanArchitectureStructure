<?php

namespace App\Providers;

use App\Interfaces\RepositoryInterfaces\Users\User\UserRepositoryInterface;
use App\Repositories\Users\User\UserRepository;
use App\Repositories\BaseRepository;
use App\Interfaces\RepositoryInterfaces\BaseRepositoryInterface;
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
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
