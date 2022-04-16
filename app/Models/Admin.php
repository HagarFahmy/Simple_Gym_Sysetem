<?php

namespace App\Models;

use App\Http\Foundation\Classes\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPasswordNotification;


class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    const LOCATION = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'status',
        'city_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImagePathAttribute()
    {
        return asset('storage/images/' . self::LOCATION . '/' . $this->image);
    }

    public function city() // city manager
    {
        return $this->belongsTo(City::class);
    }

    public function gyms() // city manager
    {
        return $this->hasMany(Gym::class);
    }

    
    public function gym() // gym manager
    {
        return $this->belongsTo(Gym::class);
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
