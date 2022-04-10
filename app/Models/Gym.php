<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'cover_image',
        'name',
        'city_id',
        'city_manager_id',
    ];

    public function coaches() // done
    {
        return $this->hasMany(Coach::class);
    }
    
    public function gym_managers() // done
    {
        return $this->hasMany(Admin::class);
    }

    public function city_manager() // done
    {
        return $this->belongsTo(Admin::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function training_sessions() // done
    {
        return $this->hasMany(TrainingSession::class);
    }

    public function user() // done
    {
        return $this->hasMany(User::class);
    }
}
