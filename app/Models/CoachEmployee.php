<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CoachEmployee extends Pivot
{
    protected $table = 'coach_employee';

    protected $fillable = [
        'coach_id',
        'user_id',
    ];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function employee()
    {
        return $this->belongsTo(User::class);
    }
}
