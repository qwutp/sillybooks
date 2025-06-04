<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class CreateDefaultRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create default roles and permissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Creating default roles...');

        if (!Schema::hasTable('roles')) {
            $this->error('Table "roles" does not exist. Please run migrations first.');
            return Command::FAILURE;
        }
        
        if (!Schema::hasTable('permissions')) {
            $this->error('Table "permissions" does not exist. Please run migrations first.');
            return Command::FAILURE;
        }
        
        if (!Schema::hasTable('role_permission')) {
            $this->error('Table "role_permission" does not exist. Please run migrations first.');
            return Command::FAILURE;
        }
        
        if (!Role::where('slug', 'admin')->exists()) {
            $adminRole = Role::create([
                'name' => 'Administrator',
                'slug' => 'admin',
                'description' => 'Administrator with full access',
            ]);
            $this->info('Created admin role');
            Log::info('Created admin role');
        } else {
            $adminRole = Role::where('slug', 'admin')->first();
            $this->info('Admin role already exists');
        }

        if (!Role::where('slug', 'user')->exists()) {
            $userRole = Role::create([
                'name' => 'User',
                'slug' => 'user',
                'description' => 'Regular user',
            ]);
            $this->info('Created user role');
            Log::info('Created user role');
        } else {
            $this->info('User role already exists');
        }

        $permissions = [
            ['name' => 'Manage Users', 'slug' => 'manage-users'],
            ['name' => 'Manage Books', 'slug' => 'manage-books'],
            ['name' => 'Manage Authors', 'slug' => 'manage-authors'],
            ['name' => 'Manage Genres', 'slug' => 'manage-genres'],
            ['name' => 'Manage Reviews', 'slug' => 'manage-reviews'],
            ['name' => 'View Admin Dashboard', 'slug' => 'view-admin-dashboard'],
        ];
        
        foreach ($permissions as $permData) {
            if (!Permission::where('slug', $permData['slug'])->exists()) {
                $permission = Permission::create([
                    'name' => $permData['name'],
                    'slug' => $permData['slug'],
                    'description' => $permData['name'] . ' permission',
                ]);
                $this->info('Created permission: ' . $permData['name']);

                if (isset($adminRole)) {
                    try {
                        $adminRole->givePermissionTo($permission);
                        $this->info('Assigned permission to admin role: ' . $permData['name']);
                    } catch (\Exception $e) {
                        $this->error('Failed to assign permission: ' . $e->getMessage());
                        Log::error('Failed to assign permission: ' . $e->getMessage());
                    }
                }
            } else {
                $this->info('Permission already exists: ' . $permData['slug']);
            }
        }
        
        $this->info('Default roles and permissions created successfully!');
        return Command::SUCCESS;
    }
}
