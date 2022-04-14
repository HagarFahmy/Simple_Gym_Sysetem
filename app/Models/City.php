<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cityManager()
    {
        return $this->hasOne(Admin::class);
    }

    public function gyms()
    {
        return $this->hasMany(Gym::class);
    }
}
