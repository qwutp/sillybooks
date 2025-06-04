<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            GenreSeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
            ReviewSeeder::class,
            UserBookSeeder::class,
        ]);
    }
}
