<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class RegisterAPIRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
            'name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'string',
                'email',
                'unique:users',
            ],
            'password' => [
                'required',
                'min:8',
            ]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => __('Validation errors'),
                'data' => $validator->errors(),
            ])
        );
    }


    public function messages()
    {
        return [
            'name.required' => __('A name is required'),
            'email.required' => __('An eMail address is required'),
            'email.unique' => __('A unique eMail address is required'),
            'email.email' => __('A valid eMail address is required'),
            'password.min' => __('The password must be at least 8 characters long'),
        ];
    }
}
