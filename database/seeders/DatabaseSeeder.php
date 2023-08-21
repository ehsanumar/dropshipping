<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Product_category::factory(200)->create();
    //    \App\Models\User::factory(78)->create()->each(function ($user) {
    //         $user->assignRole('user'); // Assign the 'user' role to each created user
    //     });
        // $this->call(RolePermissionSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
