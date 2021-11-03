<?php

namespace App\Providers;

use App\Repositories\ITopicRepositoryInterface;
use App\Repositories\TopicRepository;
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
        $this->app->bind(
            ITopicRepositoryInterface::class,
            TopicRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
//    public function boot()
//    {
//        //
//    }
}
