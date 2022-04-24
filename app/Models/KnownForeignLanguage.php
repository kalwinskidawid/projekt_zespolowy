<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class KnownForeignLanguage extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'profile_id',
        'language_id',
        'level_id'
    ];

    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    public function language(){
        return $this->belongsTo(Language::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }
}
