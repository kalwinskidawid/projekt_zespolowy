<?php

namespace Tests\Unit;

use App\Models\Level;
use App\Models\User;
use Tests\TestCase;

class LevelTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    //test go with login in
    public function test_check()
    {
        $user = User::first();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/levels');

        $response->assertStatus(200);
    }

    //test go without login in access denied
    public function test_withoutLogin()
    {

        $response = $this->withSession(['banned' => false])
            ->get('/levels');

        $response->assertStatus(403);
    }

    //sprawdzanie wprowadzenia danych przez użytkownika
    public function test_store_byUser()
    {
        $user = User::first();

        $lvl = Level::where('name','=','Ekspert')->delete();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/levels/', [
                'name' => 'Ekspert',
            ]);

        $lvl = Level::where('name','=','Ekspert')->get();

        $this->assertTrue($lvl!=null);
    }

    //unikalne dane testowe
    public function test_validation_unique()
    {
        $user = User::first();

        $lvl = Level::where('name','=','Ekspert')->delete();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/levels/', [
                'name' => 'Ekspert',
            ]);

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->post('/levels/', [
                'name' => 'Ekspert',
            ]);


        $response->assertStatus(302);
    }

    //sprawdzenie czy jest wyświetlany rekord z tablicy
    public function test_view(){
        {
            $level=Level::first()->name;
            $user = User::first();

            $view = $this->actingAs($user)->view(
                'levels.index',
                [
                    'levels' => Level::withTrashed()->get(),
                ]);

            $view->assertSee($level);
        }
    }

}
