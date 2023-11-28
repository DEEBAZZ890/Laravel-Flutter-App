<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class PaginationAPIRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'page'=>[
                'sometimes',
                'min:1',
                'integer'
            ],
            'per_page'=>[
                'sometimes',
                'min:1',
                'max:10',
                'integer'
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'data' => $validator->errors(),
            ])
        );
    }


    public function messages(): array
    {
        return [
            'page.min' => 'Page must be an integer greater or equal to 1.',
            'per_page.min' => 'Per Page must be an integer greater or equal to 1.',
            'per_page.max' => 'Per Page must be an integer less or equal to 3.',
        ];
    }
}
