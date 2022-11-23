<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Run the database seeds.
        $this->call([
            RolesAndPermissionsSeeder::class,
            UsersTableSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
        ]);
    }
}
