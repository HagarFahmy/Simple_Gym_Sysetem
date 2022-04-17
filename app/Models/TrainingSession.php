<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    use HasFactory;
    protected $table = 'training_sessions';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'starts_at',
        'finishes_at',
        'gym_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_training_session', 'training_session_id', 'user_id');
    }

    public function coaches()
    {
        return $this->belongsToMany(Coach::class, 'coach_training_session', 'training_session_id', 'coach_id');
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function attendances_sessions(){
        return $this->hasMany(Attendance::class);
    }
}
