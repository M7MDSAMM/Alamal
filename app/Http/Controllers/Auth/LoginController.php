<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function showLogin()
    {
        return response()->view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $loggedIn = Auth::attempt($request->loginInfo());
        if ($loggedIn) {
            return parent::successResponse('Logged in successfully!', 'تمت عملية تسجيل الدخول بنجاح');
        }
        return parent::errorResponse('Wrong email or password.', 'البريد الإلكتروني أو كلمة المرور غير صحيحة');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
