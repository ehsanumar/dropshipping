<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SuperAdminRole = Role::where('name', 'super-admin')->first();
        $SuperAdminRole->syncPermissions(Permission::all());

        //Admin Permissions
        // $SuperAdminRole = Role::where('name', 'admin')->first();
        // $SuperAdminRole->syncPermissions(Permission::whereIn('name', ['manage_user', 'manage_product', 'manage_brand', 'manage_catagories', 'manage_favorate', 'manage_cart', 'manage_profile'])->get());

        //User Permissions
        // $SuperAdminRole = Role::where('name', 'user')->first();
        // $SuperAdminRole->syncPermissions(Permission::whereIn('name', ['manage_favorate', 'manage_cart', 'manage_profile'])->get());

    }
}
