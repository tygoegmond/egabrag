<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function employee()
    {
        return $this->belongsToMany(User::class, 'coach_employee', 'coach_id', 'user_id');
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'coach_category', 'coach_id', 'category_id');
    }
}
