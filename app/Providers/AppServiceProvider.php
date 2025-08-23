<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

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
        //

            $settings = [];

            View::share('_s',[
                'primary' => '',
            ]);

                View::composer('*', function ($view) {
                $user = Auth::user();

                if ($user) {
                    $roleId = $user->user_type ?? null;
                    $role = Role::find($roleId);

                    $permissions = [];
                    if ($role && $role->permissions) {
                        $permissions = $role->permissions ;
                    }
                    $view->with('isAdmin', $roleId);
                    $view->with('Permissions', $permissions);
                }
            });

    }
}
