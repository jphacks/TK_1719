<?php

namespace App\Repositories;

use App\Repositories\Eloquent\User;
use JWTAuth;

class UserRepository
{
    public function findOrFail(int $userId)
    {
        return User::findOrFail($userId);
    }

    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function getCurrectUser()
    {
        $user = JWTAuth::parseToken()->authenticate();
        return $user;
    }

    public function authenticate(array $credentials)
    {
        $token = JWTAuth::attempt($credentials);
        return $token;
    }

    public function update($user, $attributes)
    {
        $user->fill($attributes);
        $user->save();
        return $user;
    }
}
