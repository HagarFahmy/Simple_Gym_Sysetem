<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use  Billable , HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    const LOCATION = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'date_of_birth',
        'profile_image' ,
        'gym_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function training_sessions() // done
    {
        return $this->belongsToMany(TrainingSession::class, 'user_training_session', 'training_session_id', 'user_id');
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);

    }
     public function getImagePathAttribute()
    {
        return asset('storage/images/' . self::LOCATION . '/' . $this->profile_image);
    }
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
