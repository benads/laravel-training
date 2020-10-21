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

    /**
     * @test
     */
    public function user_can_create_a_post()
    {
        $user = User::first();

        $token = \Tymon\JWTAuth\Facades\JWTAuth::fromUser($user); 

        $data = [
            'title' => 'Im a fake title',
            'content' => 'Im a fake content',
            'user_id' => $user->id
        ];


        $response = $this->post('api/post/create?token=' . $token, $data);

        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function user_not_connected_cant_create_a_post()
    {
        $user = User::first();

        $data = [
            'title' => 'Im a fake title',
            'content' => 'Im a fake content',
            'user_id' => $user->id
        ];

        $response = $this->post('api/post/create', $data);

        $response->assertStatus(401);

        $response->assertJson([
            'error' => 'unauthenticated',
        ]);
    }
}
