<?php

namespace Database\Seeders\Auth;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{

    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $admin = Role::create([ 'name' => config('app.admin_role') ]);
        $pracownik = Role::create([ 'name' => config('app.pracownik_role') ]);
        $pracodawca = Role::create([ 'name' => config('app.pracodawca_role') ]);
    }
}
