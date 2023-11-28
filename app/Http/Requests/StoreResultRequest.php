<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResultRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'quiz_attempt_id' => 'required|exists:quiz_attempts,id',
            'user_id' => 'required|exists:users,id',
            'score' => 'required|integer',
            'passed' => 'required|boolean',
            'feedback' => 'nullable|string',
        ];
    }
}
