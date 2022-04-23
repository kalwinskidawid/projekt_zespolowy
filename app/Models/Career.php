<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'profile_id',
        'start_date',
        'end_date',
        'position',
        'description'
    ];

    public function profile(){
        return $this->belongsTo(Profile::class);
    }
}
