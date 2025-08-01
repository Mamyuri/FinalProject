<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * المسار اللي يروح له المستخدم بعد تسجيل الدخول
     */
    protected function redirectTo()
    {
        return route('home');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}