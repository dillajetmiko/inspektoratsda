<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

define("ADMIN", 1);
define("USER", 2);
define("SUPERADMIN", 3);

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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
        $this->registerPolicies();

        Gate::define('edit-lhp', function (User $user) {
            return in_array($user->id_role, [ADMIN,SUPERADMIN]);
        });

        Gate::define('hapus-lhp', function (User $user) {
            return in_array($user->id_role, [ADMIN,SUPERADMIN]);
        });

        Gate::define('edit-hapus-lhp', function (User $user) {
            return in_array($user->id_role, [ADMIN,SUPERADMIN]);
        });

        Gate::define('tambah-lhp', function (User $user) {
            return in_array($user->id_role, [ADMIN,SUPERADMIN]);
        });

        Gate::define('edit-hapus-temuan', function (User $user) {
            return in_array($user->id_role, [ADMIN,SUPERADMIN]);
        });

        Gate::define('tambah-temuan', function (User $user) {
            return in_array($user->id_role, [ADMIN,SUPERADMIN]);
        });

        Gate::define('edit-hapus-pegawai', function (User $user) {
            return in_array($user->id_role, [ADMIN,SUPERADMIN]);
        });

        Gate::define('tambah-pegawai', function (User $user) {
            return in_array($user->id_role, [ADMIN,SUPERADMIN]);
        });

        Gate::define('edit-hapus-spt', function (User $user) {
            return in_array($user->id_role, [ADMIN,SUPERADMIN]);
        });

        Gate::define('tambah-spt', function (User $user) {
            return in_array($user->id_role, [ADMIN,SUPERADMIN]);
        });

        Gate::define('edit-hapus-user', function (User $user) {
            return in_array($user->id_role, [ADMIN,SUPERADMIN]);
        });

        Gate::define('update-role', function (User $user) {
            return in_array($user->id_role, [SUPERADMIN]);
        });

        Gate::define('show-menu', function (User $user) {
            return ($user->id_role > 0);
        });

        //
    }
}
