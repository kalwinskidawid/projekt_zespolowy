<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type1 = Type::create([
            'name' => 'pracownik'
        ]);

        $type2 = Type::create([
            'name' => 'pracodawca'
        ]);
    }
}
