<?php

namespace App\Services;

use App\Repositories\UserRepository;
use DB;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findOrFail($userId)
    {
        return $this->userRepository->findOrFail($userId);
    }

    public function update($user, $attributes)
    {
        return DB::transaction(function () use ($user, $attributes) {
            return $this->userRepository->update($user, $attributes);
        });
    }
}
