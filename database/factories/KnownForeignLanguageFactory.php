<?php

namespace Database\Factories;

use App\Models\Language;
use App\Models\Level;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;



class KnownForeignLanguageFactory extends Factory
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
            'language_id' => Language::all()->random()->id,
            'level_id' => Level::all()->random()->id
        ];
    }
}
