<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SchoolType;

class SchoolTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultSchoolTypes = [
            SchoolType::create(['name' => 'Szkoła średnia']),
            SchoolType::create(['name' => 'Szkoła wyższa']),


        ];
    }
}
