<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contracttype extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    // każdy typ kontraktu może wystąpić w ogłoszeniu pracowników wiele razy
    public function employeeadvert()
    {
        return $this->hasMany(Employeeadvert::class);
    }
}
