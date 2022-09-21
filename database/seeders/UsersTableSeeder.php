<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => "Tygo Egmond",
            'email' => "me@tygoegmond.nl",
            'password' => Hash::make("12345678"),
        ]);

        $user->assignRole('admin');
    }
}
