<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultLanguage = [
            Language::create(['name' => 'polski']),
            Language::create(['name' => 'angielski']),
            Language::create(['name' => 'niemiecki']),
            Language::create(['name' => 'ukraiński']),
            Language::create(['name' => 'francuski']),
            Language::create(['name' => 'hiszpański']),
            Language::create(['name' => 'włoski']),
            Language::create(['name' => 'arabski']),
            Language::create(['name' => 'hinglisz']),
        ];
    }
}
