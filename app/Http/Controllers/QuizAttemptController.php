<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizAttemptRequest;
use App\Http\Requests\UpdateQuizAttemptRequest;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\User;

class QuizAttemptController extends Controller
{
    function __construct()
    {
        $this->middleware('role:lecturer|admin', ['except' => ['index', 'show']]);
        // Define other middlewares as needed
    }

    public function index()
    {
        $quizAttempts = QuizAttempt::with(['user', 'quiz'])->paginate(10);
        return view('quizAttempts.index', compact('quizAttempts'));
    }

    public function create()
    {
        $users = User::all();
        $quizzes = Quiz::all();
        return view('quizAttempts.create', compact('users', 'quizzes'));
    }

    public function store(StoreQuizAttemptRequest $request)
    {
        QuizAttempt::create($request->validated());
        return redirect()->route('quizAttempts.index')->with('success', 'Quiz attempt created successfully.');
    }

    public function show(QuizAttempt $quizAttempt)
    {
        return view('quizAttempts.show', compact('quizAttempt'));
    }

    public function edit(QuizAttempt $quizAttempt)
    {
        $users = User::all();
        $quizzes = Quiz::all();
        return view('quizAttempts.edit', compact('quizAttempt', 'users', 'quizzes'));
    }

    public function update(UpdateQuizAttemptRequest $request, QuizAttempt $quizAttempt)
    {
        $quizAttempt->update($request->validated());
        return redirect()->route('quizAttempts.index')->with('success', 'Quiz attempt updated successfully.');
    }

    public function delete(QuizAttempt $quizAttempt)
    {
        return view('quizAttempts.delete', compact('quizAttempt'));
    }

    public function destroy(QuizAttempt $quizAttempt)
    {
        $quizAttempt->delete();
        return redirect()->route('quizAttempts.index')->with('success', 'Quiz attempt deleted successfully.');
    }
}

