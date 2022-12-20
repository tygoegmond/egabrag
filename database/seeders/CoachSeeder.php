<?php

namespace Database\Seeders;

use App\Models\Coach;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Coach Companies
        $coach = Coach::create([
            'name' => "Believe Coaching",
            'email' => "info@blvcoaching.nl"
        ]);

        $coach->employee()->attach(1);
    }
}
