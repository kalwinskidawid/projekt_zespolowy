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
        'name'

    ];

    public function scopeWithInactive(Builder $query): Builder
    {
        return $query->withTrashed();
    }
}
