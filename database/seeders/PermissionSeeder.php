<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        $permissions = [
            'create_users',
            'read_users',
            'update_users',
            'delete_users',
            //product permissions
            'create_product',
            'read_product',
            'update_product',
            'delete_product',
            // Brand
            'create_brand',
            'read_brand',
            'update_brand',
            'delete_brand',
            //category
            'create_category',
            'read_category',
            'update_category',
            'delete_category',
            //display Admin And Users
            'show_users',
            'show_admin',
            //users Actions
            'create_favourite',
            'read_favourite',
            'delete_favourite',
            'create_cart',
            'read_cart',
            'delete_cart',
            'show_details',
        ];
        foreach ($permissions as  $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
