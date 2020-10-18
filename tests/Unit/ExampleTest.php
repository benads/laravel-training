<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class ExampleTest extends TestCase
{
    /**
     * @test
     *
     * A basic test example.
     *
     * @return void
     */
    public function user_can_login()
    {
        $response = $this->postJson('/api/login', ['email' => 'User2Groupe1@dev.com', 'password' => '123456']);

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function user_can_see_posts()
    {
        $user = User::first();

        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user); 

        $response = $this->get('api/posts?token=' . $token);

        $response->assertStatus(200);
    }
}
