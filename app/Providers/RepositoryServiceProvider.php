<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\RegulationRepository::class, \App\Repositories\RegulationRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CourseRepository::class, \App\Repositories\CourseRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ActivityTypeRepository::class, \App\Repositories\ActivityTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserTypeRepository::class, \App\Repositories\UserTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserTypesUserRepository::class, \App\Repositories\UserTypesUserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ActivityRepository::class, \App\Repositories\ActivityRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ProcessRepository::class, \App\Repositories\ProcessRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RequestRepository::class, \App\Repositories\RequestRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ResquestRepository::class, \App\Repositories\ResquestRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SolicitationRepository::class, \App\Repositories\SolicitationRepositoryEloquent::class);
        //:end-bindings:
    }
}
