<?php

namespace Tests\Feature;

use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GameTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_list_game()
    {
        $game = [
            'name' => 'GTA',
            'developer' => 'Rockstar',
            'platform' => 'pc',
            'description' => 'sei la',
            'price' => 8,
            'release' => '2016'
        ];
        Game::create($game);

    }
}
