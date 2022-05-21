<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificateFactory extends Factory
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
            'name' => 'Certyfikat UDEMY ' . $this->faker->word(),
            'achievement_date' => $this->faker->dateTimeBetween('now', '+15 days'),
            'link' => $this->faker->url(),
            'description'=>""
        ];
    }
}
