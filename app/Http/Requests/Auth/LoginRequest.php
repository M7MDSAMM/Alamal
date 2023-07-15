<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }

    public function loginInfo(): array
    {
        $data = $this->validated();
        return [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
    }
}
