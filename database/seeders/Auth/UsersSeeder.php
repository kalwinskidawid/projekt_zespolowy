<?php

namespace Database\Seeders\Auth;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::findByName(config('app.admin_role'));
        $pracownikRole = Role::findByName(config('app.pracownik_role'));
        $pracodawcaRole = Role::findByName(config('app.pracodawca_role'));

        $user = User::create([
            'name' => 'Admin Testowy',
            'email' => 'admin@local',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('12345678'),
        ]);

        $user->markEmailAsVerified();
        $user->assignRole($adminRole);

        $user = User::create([
            'name' => 'wkonieczny',
            'email' => 'wojciech9929@gmail.com',
            'email_verified_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('zaq1@WSX')
        ]);

        $user->markEmailAsVerified();
        $user->assignRole($adminRole);

        $user = User::create([
            'name' => 'Pracownik Testowy',
            'email' => 'pracownik@local',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('12345678'),
        ]);
        $user->markEmailAsVerified();
        $user->assignRole($pracownikRole);

        $user = User::create([
            'name' => 'Użytkownik Pierwszy',
            'email' => 'user1@local',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('zaq1@WSX'),
        ]);
        $user->markEmailAsVerified();
        $user->assignRole($pracownikRole);

        $user = User::create([
            'name' => 'Użytkownik Drugi',
            'email' => 'user2@local',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('zaq1@WSX'),
        ]);
        $user->markEmailAsVerified();
        $user->assignRole($pracownikRole);

        $user = User::create([
            'name' => 'Pracodawca Testowy',
            'email' => 'pracodawca@local',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password' => Hash::make('12345678'),
        ]);
        $user->markEmailAsVerified();
        $user->assignRole($pracodawcaRole);

    }
}
