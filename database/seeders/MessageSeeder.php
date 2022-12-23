<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Message::create([
            'receiver' => 2,
            'sender' => 1,
            'message' => fake()->realTextBetween($minNbChars = 5, $maxNbChars = 50, $indexSize = 1),
            'created_at'=>now(),
            'updated_at'=>now(),
            "user_read"=>0,
        ]);

    }
}
