<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Builder;

class School extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'profile_id',
        'school_name',
        'school_type_id',
        'start_date',
        'end_date',
        'description'
    ];

    public function scopeWithInactive(Builder $query): Builder
    {
        return $query->withTrashed();
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function schoolType()
    {
        return $this->belongsTo(SchoolType::class);
    }

}
