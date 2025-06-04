<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('slug', 'admin')->first();
        $userRole = Role::where('slug', 'user')->first();
        
        if (!$adminRole) {
            $adminRole = Role::create([
                'name' => 'Administrator',
                'slug' => 'admin',
                'description' => 'Administrator with full access',
            ]);
        }
        
        if (!$userRole) {
            $userRole = Role::create([
                'name' => 'User',
                'slug' => 'user',
                'description' => 'Regular user',
            ]);
        }

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@sillybooks.com',
            'password' => Hash::make('password'),
            'avatar' => 'admin-avatar.png',
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'name' => 'User User',
            'email' => 'ivan@example.com',
            'password' => Hash::make('password'),
            'avatar' => 'user1-avatar.png',
            'role_id' => $userRole->id,
        ]);

        User::factory(7)->create([
            'role_id' => $userRole->id,
        ]);
    }
}
