<?php

use App\Http\Controllers\API\AnswerAPIController;
use App\Http\Controllers\API\ApiFallbackController;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\CourseAPIController;
use App\Http\Controllers\API\QuestionAPIController;
use App\Http\Controllers\API\QuizAPIController;
use App\Http\Controllers\API\QuizAttemptAPIController;
use App\Http\Controllers\API\RecommendationAPIController;
use App\Http\Controllers\API\ResultAPIController;
use App\Http\Controllers\API\UserAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within the "api" middleware group.
|
*/

Route::post('register', [AuthAPIController::class, 'register']);
Route::post('login', [AuthAPIController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    // User routes
    Route::prefix('users')->group(function () {
        Route::get('/', [UserAPIController::class, 'index']);
        Route::get('{id}', [UserAPIController::class, 'show']);
        Route::post('/', [UserAPIController::class, 'store']);
        Route::patch('/{id}', [UserAPIController::class, 'update']);
        Route::delete('/{id}', [UserAPIController::class, 'destroy']);
    });

    // Course routes
    Route::prefix('courses')->group(function () {
        Route::get('/', [CourseAPIController::class, 'index']);
        Route::get('{id}', [CourseAPIController::class, 'show']);
        Route::post('/', [CourseAPIController::class, 'store']);
        Route::patch('/{id}', [CourseAPIController::class, 'update']);
        Route::delete('/{id}', [CourseAPIController::class, 'destroy']);
    });

    // Quiz routes
    Route::prefix('quizzes')->group(function () {
        Route::get('/', [QuizAPIController::class, 'index']);
        Route::get('{id}', [QuizAPIController::class, 'show']);
        Route::post('/', [QuizAPIController::class, 'store']);
        Route::patch('/{id}', [QuizAPIController::class, 'update']);
        Route::delete('/{id}', [QuizAPIController::class, 'destroy']);
    });

    // Question routes
    Route::prefix('questions')->group(function () {
        Route::get('/', [QuestionAPIController::class, 'index']);
        Route::get('{id}', [QuestionAPIController::class, 'show']);
        Route::post('/', [QuestionAPIController::class, 'store']);
        Route::patch('/{id}', [QuestionAPIController::class, 'update']);
        Route::delete('/{id}', [QuestionAPIController::class, 'destroy']);
    });

    // Quiz Attempt routes
    Route::prefix('quiz_attempts')->group(function () {
        Route::get('/', [QuizAttemptAPIController::class, 'index']);
        Route::get('{id}', [QuizAttemptAPIController::class, 'show']);
        Route::post('/', [QuizAttemptAPIController::class, 'store']);
        Route::patch('/{id}', [QuizAttemptAPIController::class, 'update']);
        Route::delete('/{id}', [QuizAttemptAPIController::class, 'destroy']);
    });

    // Result routes
    Route::prefix('results')->group(function () {
        Route::get('/', [ResultAPIController::class, 'index']);
        Route::get('{id}', [ResultAPIController::class, 'show']);
        Route::post('/', [ResultAPIController::class, 'store']);
        Route::patch('/{id}', [ResultAPIController::class, 'update']);
        Route::delete('/{id}', [ResultAPIController::class, 'destroy']);
    });

    // Answer routes
    Route::prefix('answers')->group(function () {
        Route::get('/', [AnswerAPIController::class, 'index']);
        Route::get('{id}', [AnswerAPIController::class, 'show']);
        Route::post('/', [AnswerAPIController::class, 'store']);
        Route::patch('/{id}', [AnswerAPIController::class, 'update']);
        Route::delete('/{id}', [AnswerAPIController::class, 'destroy']);
    });

    // Recommendation routes
    Route::prefix('recommendations')->group(function () {
        Route::get('/', [RecommendationAPIController::class, 'index']);
        Route::get('{id}', [RecommendationAPIController::class, 'show']);
        Route::post('/', [RecommendationAPIController::class, 'store']);
        Route::patch('/{id}', [RecommendationAPIController::class, 'update']);
        Route::delete('/{id}', [RecommendationAPIController::class, 'destroy']);
    });

    // Logout route
    Route::post('/logout', [AuthAPIController::class, 'logout']);
});

// Get current user's info
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Fallback route for undefined API routes
Route::fallback([ApiFallbackController::class, 'error']);
