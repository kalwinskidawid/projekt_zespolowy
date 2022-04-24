<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'profile_id',
        'technology_id',
        'level_id'
    ];

    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    public function technology(){
        return $this->belongsTo(Technology::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }
}
