<?php

namespace Database\Seeders\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin Testowy',
            'email' => 'admin@local',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('12345678'),
        ]);

        $user->markEmailAsVerified();

        $user = User::create([
            'name' => 'User Testowy',
            'email' => 'user@local',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('12345678'),
        ]);

        $user->markEmailAsVerified();

        $user = User::create([
           'name' => 'wkonieczny',
           'email' => 'wojciech9929@gmail.com',
            'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('zaq1@WSX')
        ]);

        $user->markEmailAsVerified();
    }
}
