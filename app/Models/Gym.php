<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;
    public $timestamps = false;
    const LOCATION = 'gyms';
    protected $fillable = [
        'cover_image',
        'name',
        'city_id',
        'city_manager_id',
    ];

    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }

    public function gym_managers()
    {
        return $this->hasMany(Admin::class);
    }

    public function city_manager()
    {
        return $this->belongsTo(Admin::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function training_sessions()
    {
        return $this->hasMany(TrainingSession::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function getImagePathAttribute()
    {
        return asset('storage/images/' . self::LOCATION . '/' . $this->cover_image);
    }
}
