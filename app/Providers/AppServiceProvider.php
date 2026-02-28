<?php

namespace App\Providers;

use App\Models\Colocation;
use App\Policies\ColocationPolicy;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

      protected $policies = [Colocation::class => ColocationPolicy::class,];
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
        Schema::defaultStringLength(191);
    }
}
