<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreUserRequest;
use App\Http\Requests\Api\V1\UpdateUserRequest;
use App\Services\UserService;
use App\Http\Requests\AuthUserRequest;
use JWTAuth;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function authenticate(AuthUserRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $credentials = [
            'email' => $email,
            'password' => $password,
        ];

        $token = $this->userService->authenticate($credentials);

        $user = $this->userService->getCurrectUser();
        return response()->json([
            'message' => 'Succeed your authentication',
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function showSelf()
    {
        $user = $this->userService->getCurrectUser();
        return response()->json([
            'user' => $user
        ], 200);
    }

    public function showUser(int $userId)
    {
        $user = $this->userService->findOrFail($userId);
        return response()->json([
            'user' => $user,
        ], 200);
    }

    public function showTimeline(int $userId)
    {
        $resource1 = [
            'name' => 'Kumpo',
            'image' => 'https://avatars0.githubusercontent.com/u/17805812?s=460&v=4',
        ];
        $resource2 = [
            'name' => 'Matsu',
            'image' => 'https://avatars0.githubusercontent.com/u/25384121?s=460&v=4',
        ];
        $resource3 = [
            'name' => 'Yuki',
            'image' => 'https://avatars0.githubusercontent.com/u/17805812?s=460&v=4',
        ];
        $activities = [
            $resource1, $resource2, $resource3
        ];
        return response()->json([
            'activities' => $activities,
        ], 200);
    }

    public function update(UpdateUserRequest $request, int $userId)
    {
        $user = $this->userService->getCurrectUser();
        if ($user->id != $userId) {
            return response()->json([
                'message' => 'You have no permission'
            ], 400);
        }
        $inputs = [
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'email'       => $request->input('email'),
        ];
        if ($password = $request->input('password')) {
            $inputs['password'] = $password;
        }

        $user = $this->userService->update($user, $inputs);
        return response()->json([
            'message' => 'Update successful',
            'user' => $user,
        ], 200);
    }
}
