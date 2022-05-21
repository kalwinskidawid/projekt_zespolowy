<?php

namespace Database\Seeders;


use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run()
    {
        Skill::factory()->count(10)->create();

    }
}
