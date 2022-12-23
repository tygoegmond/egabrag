<?php

namespace Database\Seeders;
use App\Models\SavingGoals;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SavingGoalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SavingGoals::create(["user"=>2,"name"=>"laptop", "saved_amount"=>200,"total_amount"=>800]);
        SavingGoals::create(["user"=>2,"name"=>"step", "saved_amount"=>100,"total_amount"=>1000]);
        SavingGoals::create(["user"=>2,"name"=>"schoenen", "saved_amount"=>10,"total_amount"=>10000]);

        //
    }
}
