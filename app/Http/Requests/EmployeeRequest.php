<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'user_id' => 'required|exists:users,id',
            'employee_position_id' => 'required|exists:employee_positions,id',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|in:男性,女性,その他,無回答',
            'birth_date' => 'required|date',
            'employment_date' => 'required|date',
            'phone_number' => 'nullable|string'
        ];
    }
}
