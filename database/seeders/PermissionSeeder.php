<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            ['name' => 'Manage Users', 'slug' => 'manage-users', 'description' => 'Can create, edit, and delete users'],
            ['name' => 'Manage Books', 'slug' => 'manage-books', 'description' => 'Can create, edit, and delete books'],
            ['name' => 'Manage Authors', 'slug' => 'manage-authors', 'description' => 'Can create, edit, and delete authors'],
            ['name' => 'Manage Genres', 'slug' => 'manage-genres', 'description' => 'Can create, edit, and delete genres'],
            ['name' => 'Manage Reviews', 'slug' => 'manage-reviews', 'description' => 'Can edit and delete reviews'],
            ['name' => 'View Admin Dashboard', 'slug' => 'view-admin-dashboard', 'description' => 'Can view the admin dashboard'],
        ];
        
        foreach ($permissions as $permData) {
            Permission::firstOrCreate(
                ['slug' => $permData['slug']],
                [
                    'name' => $permData['name'],
                    'description' => $permData['description'],
                ]
            );
        }
        
        // Assign permissions to roles
        $adminRole = Role::where('slug', 'admin')->first();
        
        if ($adminRole) {
            // Get all permissions
            $allPermissions = Permission::all();
            
            // Admin gets all permissions
            try {
                $adminRole->permissions()->sync($allPermissions->pluck('id')->toArray());
                Log::info('Assigned all permissions to admin role');
            } catch (\Exception $e) {
                Log::error('Failed to assign permissions to admin role: ' . $e->getMessage());
            }
        } else {
            Log::warning('Admin role not found when assigning permissions');
        }
    }
}
