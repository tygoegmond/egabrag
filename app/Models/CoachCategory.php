<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CoachCategory extends Pivot
{
    protected $table = 'coach_category';

    protected $fillable = [
        'coach_id',
        'category_id',
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
