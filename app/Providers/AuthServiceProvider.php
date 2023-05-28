<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public static $permission = [
        'boss' => ['boss'],
    ];
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        Gate::before(function(User $user) {
            if ($user->rule == 'admin') {
                return true;
            }
        });

        foreach (self::$permission as $action => $roles) {
            Gate::define($action, function (User $user) use ($roles){
                if (in_array($user->rule, $roles)) {
                    return true;
                }
            });
        }
    }
}
