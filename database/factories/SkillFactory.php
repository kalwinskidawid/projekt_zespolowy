<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\Profile;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Factories\Factory;


class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'profile_id' => Profile::all()->random()->id,
            'technology_id' => Technology::all()->random()->id,
            'level_id' => Level::all()->random()->id,

        ];
    }
}
