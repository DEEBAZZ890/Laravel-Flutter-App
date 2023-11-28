<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAPIRequest;
use App\Http\Requests\RegisterAPIRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends ApiBaseController
{
    /**
     * Register a new user
     * @param RegisterAPIRequest $request
     * @return JsonResponse
     * @response
     * {
     *         "success": true,
     *          "data": {
     *              "access_token": "UNKNOWN",
     *              "token_type": "UNKNOWN"
     *          },
     *          "message": "Registered successfully"
     * }
     */
    public function register(RegisterAPIRequest $request)
    {

        $postData = $request->validated();

        $user = User::create([
            'name' => $postData['name'],
            'email' => $postData['email'],
            'password' => Hash::make($postData['password']),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        $responseData = [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];

        return $this->sendResponse($responseData, "Registered successfully");
    }

    /**
     * Login as an existing user
     * @param LoginAPIRequest $request
     * @return JsonResponse
     * @response
     * {
     *          "success": true,
     *          "data": {
     *              "access_token": "UNKNOWN",
     *              "token_type": "UNKNOWN"
     *          },
     *          "message": "Logged-in"
     * }
     */
    public function login(LoginAPIRequest $request)
    {
        if (!\Auth::attempt($request->only('email', 'password'))) {
            return $this->sendError('Login information is invalid.', [], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('authToken')->plainTextToken;

        $responseData = [
            'access_token' => $token,
            'token_type' => 'Bearer',
        ];

        return $this->sendResponse($responseData, "Logged-in");
    }

    /**
     * Logout of user
     * @param Request $request
     * @return string[]
     * @response
     * {
     *      "message": "Logged out"
     * }
     */
    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message'=>'Logged out'
        ];
    }

}
