<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\SchoolType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    public function definition(): array
    {
        return [
            'profile_id' => Profile::all()->random()->id,
            'school_name' => $this->faker->word(),
            'school_type_id' => SchoolType::all()->random()->id,
            'start_date' => $this->faker->dateTimeBetween('now', '+15 days'),
            'end_date' => $this->faker->dateTimeBetween('+15days', '+30 days'),
            'description'=>""
        ];
    }
}
