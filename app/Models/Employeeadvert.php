<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employeeadvert extends Model
{
    use HasFactory;

    protected $fillable = [
        'technology_id',
        'contracttype_id',
        'salary_start',
        'location',
        'description'
    ];

    // każde ogłoszenie przypisane jest do jednego profilu
    public function profile()
    {
        $this->belongsTo(Profile::class);
    }

    // każde ogłoszenie może mieć przypisaną jedną technologię (robimy uproszczenie)
    public function technology()
    {
        $this->hasOne(Technology::class,'technology_id');
    }

    public function contracttype()
    {
        $this->belongsTo(Contracttype::class);
    }

}
