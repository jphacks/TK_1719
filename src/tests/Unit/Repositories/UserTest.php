<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Repositories\Eloquent\User;
use App\Repositories\UserRepository;
use JWTAuth;

class UserTest extends TestCase
{
    public function testGetCurrectUser()
    {
        $user = new User();

        JWTAuth::shouldReceive('parseToken->authenticate')->andReturn($user);

        $repository = new UserRepository();
        $actual = $repository->getCurrectUser();

        $this->assertEquals($user, $actual);
    }

    public function testAuthenticate()
    {
        $token = '1234jfiesfasffwe2./x';
        $credentials = [
            'email'    => 'test@jphacks.jp',
            'password' => '11111111',
        ];
        JWTAuth::shouldReceive('attempt')->with($credentials)->andReturn($token);

        $repository = new UserRepository();
        $actual = $repository->authenticate($credentials);

        $this->assertEquals($token, $actual);
    }
}
