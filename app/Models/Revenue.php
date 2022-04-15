<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    use HasFactory;
    protected $table = 'package_purchase';
    protected $fillable = [
        'amount_paid',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function training_packages()
    {
        return $this->hasMany(TrainingPackage::class, 'id', 'user_id', 'sessions_number');
    }
}
