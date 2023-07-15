<?php

namespace App\Http\Requests\Auth;

use App\Rules\NotSameEmail;
use Illuminate\Foundation\Http\FormRequest;

class ChangeEmailRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                new NotSameEmail($this->user()->email),
                'unique:admins,email,' . auth()->user()->id,
            ],
            'password' => 'required|string|current_password:admin'
        ];
    }
}
