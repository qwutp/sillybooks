<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Role::where('slug', 'admin')->exists()) {
            Role::create([
                'name' => 'Administrator',
                'slug' => 'admin',
                'description' => 'Administrator with full access',
            ]);
            Log::info('Created admin role');
        }

        if (!Role::where('slug', 'user')->exists()) {
            Role::create([
                'name' => 'User',
                'slug' => 'user',
                'description' => 'Regular user',
            ]);
            Log::info('Created user role');
        }
    }
}
