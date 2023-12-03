<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\PaginationAPIRequest;
use App\Http\Requests\StoreAnswerAPIRequest;
use App\Http\Requests\UpdateAnswerAPIRequest;
use App\Models\Answer;
use Illuminate\Http\JsonResponse;


/**
 * @group Answer API
 *
 * API endpoints for managing answers
 */
class AnswerAPIController extends ApiBaseController
{
    public function index(PaginationAPIRequest $request): JsonResponse
    {
        $perPage = $request->get('per_page', 10);
        $answers = Answer::paginate($perPage)->withQueryString();
        return $this->sendResponse(
            $answers,
            "Answers Retrieved Successfully."
        );
    }

    public function store(StoreAnswerAPIRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $answer = Answer::create($validated);

        return response()->json(
            [
                'success' => true,
                'message' => "Created Successfully.",
                'data' => [
                    'answer' => $answer,
                ],
            ],
            200
        );
    }

    public function show(int $id): JsonResponse
    {
        $answer = Answer::find($id);

        if (!$answer) {
            return $this->sendError("Answer Not Found", [], 404);
        }

        return $this->sendResponse(
            $answer,
            "Retrieved successfully."
        );
    }

    public function update(UpdateAnswerAPIRequest $request, int $id): JsonResponse
    {
        $answer = Answer::find($id);

        if (!$answer) {
            return $this->sendError("Answer Not Found", [], 404);
        }

        $validated = $request->validated();
        $answer->update($validated);

        return $this->sendResponse(
            $answer,
            "Updated successfully."
        );
    }

    public function destroy(int $id): JsonResponse
    {
        $answer = Answer::find($id);

        if (!$answer) {
            return $this->sendError("Answer Not Found", [], 404);
        }

        $answer->delete();

        return $this->sendResponse(
            null,
            "Deleted Successfully."
        );
    }
}
