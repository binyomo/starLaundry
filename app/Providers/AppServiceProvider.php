<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('owner', function(User $user){
            return $user->usertype_id == 1 || $user->usertype_id == 3;
        });

        Gate::define('staf', function(User $user){
            return $user->usertype_id == 2 || $user->usertype_id == 3;
        });

        Gate::define('admin', function(User $user){
            return $user->usertype_id == 3;
        });
    }
}
