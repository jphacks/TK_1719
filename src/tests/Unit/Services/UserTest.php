<?php

namespace Tests\Unit\Services;

use Tests\TestCase;
use Mockery;
use App\Repositories\UserRepository;
use App\Repositories\Eloquent\User;
use App\Services\UserService;

class UserTest extends TestCase
{
    public function testGetCurrectUser()
    {
        $user = new User();

        $repository = Mockery::mock('App\Repositories\UserRepository');
        $repository->shouldReceive('getCurrectUser')->andReturn($user);

        $service = new UserService($repository);
        $actual = $service->getCurrectUser();

        $this->assertEquals($user, $actual);
    }

    public function testAuthenticate()
    {
        $credentials = [
            'email' => 'test@jphacks.jp',
            'password' => '111111',
        ];

        $token = '1111111111112222341';

        $repository = Mockery::mock('App\Repositories\UserRepository');
        $repository->shouldReceive('authenticate')->with($credentials)->andReturn($token);

        $service = new UserService($repository);
        $actual = $service->authenticate($credentials);

        $this->assertEquals($token, $actual);
    }
}
