<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\UserService;
use App\Http\Requests\AuthUserRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $userService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->middleware('guest')->except('logout');
        $this->userService = $userService;
    }

    public function authenticate(AuthUserRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $credentials = [
            'email'    => $email,
            'password' => $password,
        ];

        $isAuth = Auth::attempt([
            'email'    => $email,
            'password' => $password,
        ]);
        $token = $this->userService->authenticate($credentials);

        if (!$isAuth || !$token) {
            return redirect()->back();
        }

        return redirect()->intended('/')->cookie('jwt_token', $token);
    }
}
