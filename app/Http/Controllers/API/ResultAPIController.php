<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiBaseController;
use App\Http\Requests\PaginationAPIRequest;
use App\Http\Requests\StoreResultAPIRequest;
use App\Http\Requests\UpdateResultAPIRequest;
use App\Models\Result;
use Illuminate\Http\JsonResponse;

/**
 * @group Result API
 *
 * API endpoints for managing results
 */
class ResultAPIController extends ApiBaseController
{
    /**
     * Display a listing of results.
     *
     * @param PaginationAPIRequest $request
     * @return JsonResponse
     */
    public function index(PaginationAPIRequest $request): JsonResponse
    {
        $perPage = $request->get('per_page', 10);
        $results = Result::paginate($perPage)->withQueryString();
        return $this->sendResponse($results, "Results retrieved successfully.");
    }

    /**
     * Store a newly created result.
     *
     * @param StoreResultAPIRequest $request
     * @return JsonResponse
     */
    public function store(StoreResultAPIRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $result = Result::create($validated);
        return $this->sendResponse($result, "Result created successfully.");
    }

    /**
     * Display the specified result.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $result = Result::find($id);

        if (is_null($result)) {
            return $this->sendError("Result not found.", [], 404);
        }

        return $this->sendResponse($result, "Result retrieved successfully.");
    }

    /**
     * Update the specified result.
     *
     * @param UpdateResultAPIRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateResultAPIRequest $request, int $id): JsonResponse
    {
        $result = Result::find($id);

        if (is_null($result)) {
            return $this->sendError("Result not found.", [], 404);
        }

        $result->update($request->validated());
        return $this->sendResponse($result, "Result updated successfully.");
    }

    /**
     * Remove the specified result.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $result = Result::find($id);

        if (is_null($result)) {
            return $this->sendError("Result not found.", [], 404);
        }

        $result->delete();
        return $this->sendResponse([], "Result deleted successfully.");
    }
}
