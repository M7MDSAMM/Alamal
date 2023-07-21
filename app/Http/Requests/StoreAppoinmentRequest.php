<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppoinmentRequest extends FormRequest
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
            'appoinment_date' => 'required|date',
            'appoinment_time' => 'required|date_format:H:i',
            'reason' => 'required|string|max:100',
            'patient_id' => 'required|exists:users,id',
        ];
    }
}
