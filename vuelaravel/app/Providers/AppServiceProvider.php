<?php

namespace App\Providers;

//use App\Repositories\Repository;
//use App\Repositories\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       // $this->app->singleton(Repository::class, RepositoryInterface::Class); 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
