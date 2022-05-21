<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        $faker = app(Generator::class);

        foreach(User::all() as $user){
            $name = explode(" ",$user->name);
            Profile::create(['user_id' => $user->id,
                'first_name'=>$name[0],
                'surname'=>count($name)>1 ? $name[1] : null,
                'city'=>$faker->city(),
                'portfolio'=>null,
                'about'=>null]);
        }
    }
}
