<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show($userId)
    {
        $user = $this->userService->findOrFail($userId);
        return view('user.show', ['user' => $user]);
    }
}
