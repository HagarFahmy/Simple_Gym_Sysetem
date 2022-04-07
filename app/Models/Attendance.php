<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_training_session';
    protected $fillable = [
        'user_id',
        'training_session_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function training_session()
    {
        return $this->belongsTo(TrainingSession::class);
    }
}
