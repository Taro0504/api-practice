<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFamilyRequest extends FormRequest
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
            'relationship' => 'required|string|max:255',
            'family_member_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'is_dependent' => 'required|boolean',
        ];
    }
}
