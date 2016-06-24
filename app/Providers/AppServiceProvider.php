<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
        //
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('view-dokumen', function ($user, $dokumen) {
            return $user->id === $dokumen->created_by;
        });

        $gate->define('upload-admin', function ($user, $dokumen) {
            return $user->id === $dokumen->created_by;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
