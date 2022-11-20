<?php

namespace Tests\Unit;

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
}
