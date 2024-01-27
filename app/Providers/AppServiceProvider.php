<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('staff', function (User $user){
            return $user->user_type == 'staff';
        });
        Gate::define('dosen', function (User $user){
            return $user->user_type == 'dosen';
        });
        Gate::define('mahasiswa', function (User $user){
            return $user->user_type == 'mahasiswa';
        });
    }
}
