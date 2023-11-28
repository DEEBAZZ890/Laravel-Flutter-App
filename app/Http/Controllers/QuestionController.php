<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    function __construct()
    {
        $this->middleware('role:lecturer|admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $questions = Question::paginate(10);
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        $quizzes = Quiz::all();
        return view('questions.create', compact('quizzes'));
    }

    public function store(StoreQuestionRequest $request)
    {
        Question::create($request->validated());
        return redirect()->route('questions.index')
            ->with('success', 'Question created successfully.');
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $quizzes = Quiz::all();
        return view('questions.edit', compact('question', 'quizzes'));
    }

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->validated());
        return redirect()->route('questions.index')
            ->with('success', 'Question updated successfully.');
    }

    public function delete(Question $question)
    {
        return view('questions.delete', compact('question'));
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')
            ->with('success', 'Question deleted successfully.');
    }
}
