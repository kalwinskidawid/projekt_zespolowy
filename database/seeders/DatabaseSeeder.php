<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TypesSeeder;
use Database\Seeders\Auth\UsersSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        $this->call(TypesSeeder::class);
        $this->call(UsersSeeder::class);
        
    }
}
