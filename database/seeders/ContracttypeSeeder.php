<?php

namespace Database\Seeders;

use App\Models\Contracttype;
use Illuminate\Database\Seeder;

class ContracttypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
          ['name' => 'Umowa o pracę'],
          ['name' => 'Umowa o dzieło'],
          ['name' => 'Umowa zlecenie'],
          ['name' => 'Kontrakt B2B'],
          ['name' => 'Inne']
        ];

        foreach ($types as $type)
        {
            Contracttype::create([
                'name' => $type['name']
            ]);
        }

    }
}
