<?php

use Illuminate\Database\Seeder;
use App\Models\User\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = Role::create([
            'name' => 'SuperAdmin', 
            'slug' => 'superadmin',
            'permissions' => [
                'superadmin' => true
            ]
        ]);
        $admin = Role::create([
            'name' => 'Admin', 
            'slug' => 'admin',
            'permissions' => [
                'admin' => true
            ]
        ]);
        $provider = Role::create([
            'name' => 'Provider', 
            'slug' => 'provider',
            'permissions' => [
                'provider' => true
            ]
        ]);
        $user = Role::create([
            'name' => 'User', 
            'slug' => 'user',
            'permissions' => [
            'user' => true
            ]
        ]);
    }
}
