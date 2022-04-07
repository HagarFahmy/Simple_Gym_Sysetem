<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'starts_at',
        'finishes_at',
        'gym_id'
    ];

    public function users() // done
    {
        return $this->belongsToMany(User::class, 'user_training_session', 'training_session_id', 'user_id');
    }

    public function coaches() // done
    {
        return $this->belongsToMany(Coach::class, 'coach_training_session', 'training_session_id', 'coach_id');
    }

    public function gym() // done
    {
        return $this->belongsTo(Gym::class);
    }
}
