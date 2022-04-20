<?php

namespace Database\Seeders;

use App\Http\Controllers\TechnologyController;
use App\Models\Technology;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultTechnologies = [
            Technology::create(['name' => 'Java']),
            Technology::create(['name' => 'JavaScript']),
            Technology::create(['name' => 'C#']),
            Technology::create(['name' => 'Angular']),
            Technology::create(['name' => 'C++']),
            Technology::create(['name' => 'PHP']),
        ];
    }
}
