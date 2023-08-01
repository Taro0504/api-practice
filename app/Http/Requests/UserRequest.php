<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_name' => 'required|string|max:255',
            'name_kana' => 'required|string|max:255',
            'employee_position' => 'required|integer|between:1,3',
            'email' => 'email|required|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}
