<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SchoolType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
         'name'
    ];

    public function scopeWithInactive(Builder $query): Builder
    {
        return $query->withTrashed();
    }
    //każdy typ może mieć wiele szkół
    public function schools() {
        return $this->hasMany(School::class);
    }
}
