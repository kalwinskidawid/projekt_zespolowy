<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultLevels = [
            Level::create(['name' => 'junior']),
            Level::create(['name' => 'mid']),
            Level::create(['name' => 'senior']),
            Level::create(['name' => 'podstawowy']),
            Level::create(['name' => 'średni']),
            Level::create(['name' => 'średnio zaawansowany']),
            Level::create(['name' => 'biegły']),
        ];
    }
}
