<?php

namespace App\Repositories;

use App\Repositories\Eloquent\User;

class UserRepository
{
    public function findOrFail(int $userId)
    {
        return User::findOrFail($userId);
    }

    public function update($user, $attributes)
    {
        $user->fill($attributes);
        $user->save();
        return $user;
    }
}
