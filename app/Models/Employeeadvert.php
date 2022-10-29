<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Technology;

class Employeeadvert extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'technology_id',
        'contracttype_id',
        'salary_start',
        'location',
        'description'
    ];

    // każde ogłoszenie przypisane jest do jednego profilu
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    // każde ogłoszenie może mieć przypisaną jedną technologię (robimy uproszczenie)
    public function technology()
    {
        return $this->belongsTo(Technology::class);
    }

    public function contracttype()
    {
        return $this->belongsTo(Contracttype::class);
    }

}
