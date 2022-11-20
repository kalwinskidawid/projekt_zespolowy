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

    public function test_check()
    {
        $user = User::first();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/levels');

        $response->assertStatus(200);
    }

    public function test_store()
    {
        $level1 = Level::make([
            'name' => 'Lvl1'
        ]);

        $level2 = Level::make([
            'name' => 'Lvl2'
        ]);

        $this->assertTrue($level1->name != $level2->name);
    }

    public function test_stoe_byUser()
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

}
