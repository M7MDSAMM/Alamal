<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class ChangePasswordRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password' => 'required|string|current_password:admin',
            'new_password' => 'required|string|min:8|max:100|confirmed',
        ];
    }

    public function getParsedData()
    {
        $data = $this->validated();
        $data['password'] = Hash::make($data['new_password']);
        return $data;
    }
}
