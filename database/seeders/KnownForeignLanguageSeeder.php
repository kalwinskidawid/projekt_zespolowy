<?php

namespace Database\Seeders;

use App\Models\KnownForeignLanguage;
use Illuminate\Database\Seeder;


class KnownForeignLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KnownForeignLanguage::factory()->count(10)->create();
    }
}
