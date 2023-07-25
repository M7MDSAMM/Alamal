<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'main_patient_file' => 'nullable|file|max:2048',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:150',
            'phone_number' => 'required|string|max:20',
            'gender' => 'required|in:male,female',
            'date_of_birth' => 'required|date',
            'email' => 'required|email|max:255',
            'section' => 'required|string|max:255',
            'degrees_of_severity' => 'required|string|max:255',
            'diagnosis' => 'required|string|max:255',

            'doctor' => 'nullable|string|max:255',

        ];
    }
}
