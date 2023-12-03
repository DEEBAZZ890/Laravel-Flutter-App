<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Fallback API
 *
 * API endpoints for managing fallback responses
 */
class ApiFallbackController extends ApiBaseController
{
    /**
     * @param Request $request
     * @return JsonResponse
     * {
     *      "success": false,
     *      "message": "Page Not Found. If error persists, contact 20069321@tafe.wa.edu.au"
     * }
     */
    public function error(Request $request)
    {
        return $this->sendError(
            'Page Not Found. If error persists, contact '. env("APP_CONTACT", "20069321@tafe.wa.edu.au")
        );
    }
}
