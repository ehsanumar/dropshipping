<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            'manage_admin',
            'manage_user',
            //product permissions
            'manage_product',
            // Brand
            'manage_brand',
            //category
            'manage_catagories',
            //users Actions
            'manage_favorate',
            'manage_cart',
            'manage_profile'
        ];
        foreach ($permissions as  $permission) {
            Permission::create(['name' => $permission]);
        }
        // $role = Role::create(['name' => 'super-admin']);
        // $role->givePermissionTo(Permission::all());
    }
}
