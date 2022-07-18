<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;

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

        Blade::directive('currency', function ( $expression ){ 
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>"; 
        });

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
