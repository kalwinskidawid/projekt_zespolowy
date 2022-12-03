<?php

namespace Database\Seeders;

use App\Models\Employeeadvert;
use Illuminate\Database\Seeder;

class EmployeeadvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adverts = [
            [
                  'profile_id' => 1,
                  'technology_id' => 1,
                  'contracttype_id' => 1,
                  'salary_start' => 9000,
                  'location' => 'Remote',
                  'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ],

            [
                'profile_id' => 2,
                'technology_id' => 1,
                'contracttype_id' => 3,
                'salary_start' => 4500,
                'location' => 'Kalisz',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ],

            [
                'profile_id' => 4,
                'technology_id' => 2,
                'contracttype_id' => 1,
                'salary_start' => 11000,
                'location' => 'Kraków',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ],

            [
                'profile_id' => 5,
                'technology_id' => 1,
                'contracttype_id' => 3,
                'salary_start' => 30000,
                'location' => 'New York',
                'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
            ]
        ];

        foreach ($adverts as $advert)
        {
            Employeeadvert::create([
               'profile_id' => $advert['profile_id'],
               'technology_id' => $advert['technology_id'],
               'contracttype_id' => $advert['contracttype_id'],
                'salary_start' => $advert['salary_start'],
                'location' => $advert['location'],
                'description' => $advert['description']
            ]);
        }
    }
}
