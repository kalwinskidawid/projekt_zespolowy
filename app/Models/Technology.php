<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Employeeadvert;

class Technology extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function scopeWithInactive(Builder $query): Builder
    {
        return $query->withTrashed();
    }

    public function skill(){
        return $this->hasMany(Skill::class);
    }

    // każda technologia może być przypisana do wielu ogłoszeń
    public function employeeadvert()
    {
        return $this->hasMany(Employeeadvert::class);
    }
}
