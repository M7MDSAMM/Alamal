<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangeEmailRequest;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\SaveSettingsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class AccountController extends Controller
{
    public function profile()
    {
        return response()->view('dashboard.account.profile');
    }

    public function settings()
    {
        return response()->view('dashboard.account.settings');
    }

    public function saveSettings(SaveSettingsRequest $request)
    {
        $isSaved = $request->user()->update($request->getParsedData());
        return $isSaved ? parent::successResponse() : parent::errorResponse();
    }

    public function changeEmail(ChangeEmailRequest $request)
    {
        $updated = $request->user()->update($request->validated('email'));
        return $updated ? parent::successResponse() : parent::errorResponse();
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $updated = $request->user()->update($request->getParsedData());
        return $updated ? parent::successResponse() : parent::errorResponse();
    }
}
