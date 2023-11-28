<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizAttemptAPIRequest extends FormRequest
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
            'user_id' => 'sometimes|required|exists:users,id',
            'quiz_id' => 'sometimes|required|exists:quizzes,id',
            'attempt_number' => 'sometimes|required|integer|min:1',
            'score' => 'nullable|integer|min:0',
            'completed_at' => 'nullable|date',
        ];
    }
}
