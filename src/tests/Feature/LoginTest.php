<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Repositories\Eloquent\User;
use App\Services\UserService;
use Mockery;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testAuthenticate()
    {
        $user = new User();
        $token = 'fkdisja;e.123fn/x';

        $credentials = [
            'email'    => 'test@jphacks.jp',
            'password' => '11111111',
        ];
        $userService = Mockery::mock(UserService::class);
        $userService->shouldReceive('authenticate')->with($credentials)->andReturn($token);
        $userService->shouldReceive('getCurrectUser')->andReturn($user);
        $this->app->instance(UserService::class, $userService);

        $params = [
            'email'                 => 'test@jphacks.jp',
            'password'              => '11111111',
            'password_confirmation' => '11111111',
        ];
        $response = $this->post('api/v1/authenticate', $params);
        $response->assertStatus(200)
            ->assertJson([
                'token' => $token,
            ]);
    }
}
