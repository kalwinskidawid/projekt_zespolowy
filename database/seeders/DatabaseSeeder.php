<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TypesSeeder;
use Database\Seeders\Auth\UsersSeeder;
use Database\Seeders\Auth\RolesSeeder;

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
        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TechnologySeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(ProfileSeeder::class);
        $this->call(CertificateSeeder::class);
        $this->call(SchoolTypeSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(KnownForeignLanguageSeeder::class);
        $this->call(ContracttypeSeeder::class);
        $this->call(EmployeeadvertSeeder::class);

    }
}
