<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;
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
            'username' => 'string|max:20|required',
            'email' => 'string| max:255|email|required|unique:users',
            'password' => 'string|max:255|min:6',
            'confirm-password' => 'string|required_with:password|same:password',
        ];
    }
}