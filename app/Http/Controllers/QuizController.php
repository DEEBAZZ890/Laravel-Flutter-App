<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Models\Quiz;
use App\Models\Course;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    function __construct()
    {
        $this->middleware('role:lecturer|admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $quizzes = Quiz::with('course')->paginate(10);
        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('quizzes.create', compact('courses'));
    }

    public function store(StoreQuizRequest $request)
    {
        Quiz::create($request->validated());
        return redirect()->route('quizzes.index')
            ->with('success', 'Quiz created successfully.');
    }

    public function show(Quiz $quiz)
    {
        return view('quizzes.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        $courses = Course::all();
        return view('quizzes.edit', compact('quiz', 'courses'));
    }

    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        $quiz->update($request->validated());
        return redirect()->route('quizzes.index')
            ->with('success', 'Quiz updated successfully.');
    }

    public function delete(Quiz $quiz)
    {
        return view('quizzes.delete', compact('quiz'));
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')
            ->with('success', 'Quiz deleted successfully.');
    }
}
