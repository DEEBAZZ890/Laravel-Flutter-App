<?php

namespace App\Http\Controllers\API;


use App\Http\Requests\PaginationAPIRequest;
use App\Http\Requests\StoreQuizAttemptAPIRequest;
use App\Http\Requests\UpdateQuizAttemptAPIRequest;
use App\Models\QuizAttempt;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

class QuizAttemptAPIController extends ApiBaseController
{
    public function index(PaginationAPIRequest $request): JsonResponse
    {
        $perPage = $request->get('per_page', 10);
        $quizAttempts = QuizAttempt::paginate($perPage)->withQueryString();
        return $this->sendResponse(
            $quizAttempts,
            "Quiz Attempts Retrieved Successfully."
        );
    }

    public function store(StoreQuizAttemptAPIRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $quizAttempt = QuizAttempt::create($validated);

        return response()->json(
            [
                'success' => true,
                'message' => "Created Successfully.",
                'data' => [
                    'quizAttempt' => $quizAttempt,
                ],
            ],
            200
        );
    }

    public function show(int $id): JsonResponse
    {
        $quizAttempt = QuizAttempt::find($id);

        if (!$quizAttempt) {
            return $this->sendError("Quiz Attempt Not Found", [], 404);
        }

        return $this->sendResponse(
            $quizAttempt,
            "Retrieved successfully."
        );
    }

    public function update(UpdateQuizAttemptAPIRequest $request, int $id): JsonResponse
    {
        $quizAttempt = QuizAttempt::find($id);

        if (!$quizAttempt) {
            return $this->sendError("Quiz Attempt Not Found", [], 404);
        }

        $validated = $request->validated();
        $quizAttempt->update($validated);

        return $this->sendResponse(
            $quizAttempt,
            "Updated successfully."
        );
    }

    public function destroy(int $id): JsonResponse
    {
        $quizAttempt = QuizAttempt::find($id);

        if (!$quizAttempt) {
            return $this->sendError("Quiz Attempt Not Found", [], 404);
        }

        $quizAttempt->delete();

        return $this->sendResponse(
            null,
            "Deleted Successfully."
        );
    }
}
