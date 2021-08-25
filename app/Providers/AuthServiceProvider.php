<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

define("SUPERADMIN", 1);
define("USER", 2);
define("ADMIN_EVLAP", 3);
define("ADMIN_PERENCANAAN", 4);
define("ADMIN_ADUM", 5);

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

        Gate::define('edit-hapus-lhp', function (User $user) {
            return in_array($user->id_role, [ADMIN_EVLAP,SUPERADMIN]);
        });

        Gate::define('tambah-lhp', function (User $user) {
            return in_array($user->id_role, [ADMIN_EVLAP,SUPERADMIN]);
        });

        Gate::define('show-lhp', function (User $user) {
            return in_array($user->id_role, [ADMIN_EVLAP,SUPERADMIN,USER]);
        });

        Gate::define('edit-hapus-temuan', function (User $user) {
            return in_array($user->id_role, [ADMIN_EVLAP,SUPERADMIN]);
        });

        Gate::define('tambah-temuan', function (User $user) {
            return in_array($user->id_role, [ADMIN_EVLAP,SUPERADMIN]);
        });

        Gate::define('show-temuan', function (User $user) {
            return in_array($user->id_role, [ADMIN_EVLAP,SUPERADMIN,USER]);
        });

        Gate::define('show-cetak', function (User $user) {
            return in_array($user->id_role, [ADMIN_EVLAP,SUPERADMIN,USER]);
        });

        Gate::define('edit-hapus-pegawai', function (User $user) {
            return in_array($user->id_role, [ADMIN_ADUM,SUPERADMIN]);
        });

        Gate::define('tambah-pegawai', function (User $user) {
            return in_array($user->id_role, [ADMIN_ADUM,SUPERADMIN]);
        });

        Gate::define('show-pegawai', function (User $user) {
            return in_array($user->id_role, [ADMIN_ADUM,SUPERADMIN,USER]);
        });

        Gate::define('edit-hapus-spt', function (User $user) {
            return in_array($user->id_role, [ADMIN_PERENCANAAN,SUPERADMIN]);
        });

        Gate::define('tambah-spt', function (User $user) {
            return in_array($user->id_role, [ADMIN_PERENCANAAN,SUPERADMIN]);
        });

        Gate::define('show-spt', function (User $user) {
            return in_array($user->id_role, [ADMIN_PERENCANAAN,SUPERADMIN,USER,ADMIN_EVLAP]);
        });

        Gate::define('edit-hapus-user', function (User $user) {
            return in_array($user->id_role, [SUPERADMIN]);
        });

        Gate::define('tambah-user', function (User $user) {
            return in_array($user->id_role, [SUPERADMIN]);
        });

        Gate::define('show-user', function (User $user) {
            return in_array($user->id_role, [SUPERADMIN,USER]);
        });

        Gate::define('update-role', function (User $user) {
            return in_array($user->id_role, [SUPERADMIN]);
        });

        Gate::define('show-menu', function (User $user) {
            return ($user->id_role > 0);
        });

        Gate::define('edit-hapus-rekomendasi', function (User $user) {
            return in_array($user->id_role, [ADMIN_EVLAP,SUPERADMIN]);
        });


    }
}
