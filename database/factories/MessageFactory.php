<?php

namespace Database\Factories;

use App\Models\Message;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Message::class;
    public function definition()
    {
        return [
            'receiver' => 2,
            'sender' => 1,
            'message' => fake()->realTextBetween($minNbChars = 5, $maxNbChars = 50, $indexSize = 1),
            'created_at'=>now(),
            'updated_at'=>now(),
            "user_read"=>0,
            //
        ];
    }
}
