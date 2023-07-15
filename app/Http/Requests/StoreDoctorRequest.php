<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|digits_between:10,15',
            'email' => 'required|email|max:255|unique:admins',
            'specialty' => 'required|in:Oncology,Radiation Oncology,Surgical Oncology,Pediatric Oncology,Hematology',
        ];
    }
}
