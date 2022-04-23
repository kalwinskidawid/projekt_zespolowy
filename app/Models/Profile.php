<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

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
}
