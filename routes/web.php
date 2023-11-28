<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizAttemptController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin specific routes
    Route::prefix('admin')->group(function () {
        Route::resource('users', UserController::class);

        Route::resource('roles', RoleController::class);
        Route::get('roles/{role}', [RoleController::class, 'show']) ->name('roles.show');
        Route::get('/roles{role}/delete', [RoleController::class, 'delete'])->name('roles.delete');

        Route::resource('permissions', PermissionController::class);

        Route::resource('questions', QuestionController::class);
        Route::get('/questions{question}', [QuestionController::class, 'show'])->name('questions.show');
        Route::get('/questions{question}/delete', [QuestionController::class, 'delete'])->name('questions.delete');

        Route::resource('courses', CourseController::class);
        Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
        Route::get('/courses/{course}/delete', [CourseController::class, 'delete'])->name('courses.delete');

        Route::resource('quizzes', QuizController::class);
        Route::get('/quizzes/{quiz}', [QuizController::class, 'show'])->name('quizzes.show');
        Route::get('/quizzes/{quiz}/delete', [QuizController::class, 'delete'])->name('quizzes.delete');

        Route::resource('quizAttempts', QuizAttemptController::class);
        Route::get('/quizAttempts/{quizAttempt}', [QuizAttemptController::class, 'show'])->name('quizAttempts.show');
        Route::get('/quizAttempts/{quizAttempt}/delete', [QuizAttemptController::class, 'delete'])->name('quizAttempts.delete');

        Route::resource('results', ResultController::class); // Add this line
        Route::get('/results/{result}', [ResultController::class, 'show'])->name('results.show');
        Route::get('/results/{result}/delete', [ResultController::class, 'delete'])->name('results.delete');

        Route::resource('answers', \App\Http\Controllers\AnswerController::class);
        Route::get('/answers/{answer}', [\App\Http\Controllers\AnswerController::class, 'show'])->name('answers.show');
        Route::get('/answers/{answer}/delete', [\App\Http\Controllers\AnswerController::class, 'delete'])->name('answers.delete');

        Route::resource('recommendations', RecommendationController::class);
        Route::get('/recommendations/{recommendation}', [RecommendationController::class, 'show'])->name('recommendations.show');
        Route::get('/recommendations/{recommendation}/delete', [RecommendationController::class, 'delete'])->name('recommendations.delete');


        // Add other admin-specific routes here
    });

});

require __DIR__.'/auth.php';
