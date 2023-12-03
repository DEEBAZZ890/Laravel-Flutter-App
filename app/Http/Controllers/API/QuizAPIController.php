<?php

namespace App\Http\Controllers\API;

use App\Models\Quiz;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizAPIRequest;
use App\Http\Requests\UpdateQuizAPIRequest;
use Illuminate\Http\JsonResponse;

/**
 * @group Quiz API
 *
 * API endpoints for managing quizzes
 */
class QuizAPIController extends ApiBaseController
{
    /**
     * Display a listing of quizzes.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $quizzes = Quiz::paginate(10);
        return $this->sendResponse($quizzes, 'Quizzes retrieved successfully.');
    }

    /**
     * Store a newly created quiz in storage.
     * @param StoreQuizAPIRequest $request
     * @return JsonResponse
     */
    public function store(StoreQuizAPIRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $quiz = Quiz::create($validated);

        return response()->json(
            [
                'success' => true,
                'message' => 'Quiz created successfully.',
                'data' => $quiz,
            ],
            200
        );
    }

    /**
     * Display the specified quiz.
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $quiz = Quiz::find($id);

        if (!$quiz) {
            return $this->sendError('Quiz not found.', [], 404);
        }

        return $this->sendResponse($quiz, 'Quiz retrieved successfully.');
    }

    /**
     * Update the specified quiz in storage.
     * @param UpdateQuizAPIRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateQuizAPIRequest $request, int $id): JsonResponse
    {

        $quiz = Quiz::find($id);

        if (!$quiz) {
            return $this->sendError('Quiz not found.', [], 404);
        }

        $quiz->update($request->validated());

        return $this->sendResponse($quiz, 'Quiz updated successfully.');
    }

    /**
     * Remove the specified quiz from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $quiz = Quiz::find($id);

        if (!$quiz) {
            return $this->sendError('Quiz not found.', [], 404);
        }

        $quiz->delete();

        return $this->sendResponse(null, 'Quiz deleted successfully.');
    }
}
