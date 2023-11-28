<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecommendationAPIRequest;
use App\Http\Requests\UpdateRecommendationAPIRequest;
use App\Models\Recommendation;
use Illuminate\Http\JsonResponse;

class RecommendationAPIController extends ApiBaseController
{
    /**
     * Display a listing of recommendations.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $recommendations = Recommendation::paginate(10);
        return $this->sendResponse($recommendations, 'Recommendations retrieved successfully.');
    }

    /**
     * Store a newly created recommendation in storage.
     * @param StoreRecommendationAPIRequest $request
     * @return JsonResponse
     */
    public function store(StoreRecommendationAPIRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $recommendation = Recommendation::create($validated);

        return response()->json(
            [
                'success' => true,
                'message' => 'Recommendation created successfully.',
                'data' => $recommendation,
            ],
            200
        );
    }

    /**
     * Display the specified recommendation.
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $recommendation = Recommendation::find($id);

        if (!$recommendation) {
            return $this->sendError('Recommendation not found.', [], 404);
        }

        return $this->sendResponse($recommendation, 'Recommendation retrieved successfully.');
    }

    /**
     * Update the specified recommendation in storage.
     * @param UpdateRecommendationAPIRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateRecommendationAPIRequest $request, int $id): JsonResponse
    {
        $recommendation = Recommendation::find($id);

        if (!$recommendation) {
            return $this->sendError('Recommendation not found.', [], 404);
        }

        $recommendation->update($request->validated());

        return $this->sendResponse($recommendation, 'Recommendation updated successfully.');
    }

    /**
     * Remove the specified recommendation from storage.
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $recommendation = Recommendation::find($id);

        if (!$recommendation) {
            return $this->sendError('Recommendation not found.', [], 404);
        }

        $recommendation->delete();

        return $this->sendResponse(null, 'Recommendation deleted successfully.');
    }
}
