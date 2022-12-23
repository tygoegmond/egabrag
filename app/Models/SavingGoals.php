<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingGoals extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user',
        'saved_amount',
        'total_amount'];
}
