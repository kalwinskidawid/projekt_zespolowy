<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Builder;

class Certificate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'profile_id',
        'achievement_date',
        'name',
        'link',
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
}
