<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'first_name',
        'surname',
        'city',
        'portfolio'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function career()
    {
        return $this->hasMany(Career::class);
    }

    public function certificate()
    {
        return $this->hasMany(Certificate::class);
    }

    public function skill()
    {
        return $this->hasMany(Skill::class);
    }
    public function school()
    {
        return $this->hasMany(School::class);
    }

    // każdy profil może miec wiele ogłoszeń
    public function employeeadverts()
    {
        $this->hasMany(Employeeadvert::class);
    }
}
