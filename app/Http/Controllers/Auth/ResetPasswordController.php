<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class ResetPasswordController extends Controller
{
    public function showForgotPassword($broker)
    {
        if (!in_array($broker, ['admins', 'users'])) return abort(Response::HTTP_NOT_FOUND);
        return response()->view('auth.forgot-password', compact('broker'));
    }

    public function forgotPassword(ForgotPasswordRequest $request, $broker)
    {
        if (!in_array($broker, ['admins', 'users'])) return abort(Response::HTTP_NOT_FOUND);
        $status = Password::broker($broker)->sendResetLink(
            $request->only('email'),
        );
        if ($status === Password::RESET_LINK_SENT) {
            return parent::successResponse(__($status));
        }
        return parent::errorResponse(__($status));
    }

    public function showResetPassword($token, $broker)
    {
        return response()->view('auth.reset-password', compact('token', 'broker'));
    }

    public function resetPassword(ResetPasswordRequest $request, $broker)
    {
        if (!in_array($broker, ['admins', 'users'])) return abort(Response::HTTP_NOT_FOUND);

        $status = Password::broker($broker)->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return parent::successResponse(__($status));
        }
        return parent::errorResponse(__($status));
    }
}
