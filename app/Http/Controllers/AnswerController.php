<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    function __construct()
    {
        $this->middleware('role:lecturer|admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $answers = Answer::with('question')->paginate(10);
        return view('answers.index', compact('answers'));
    }

    public function create()
    {
        $questions = Question::all();
        return view('answers.create', compact('questions'));
    }

    public function store(StoreAnswerRequest $request)
    {
        Answer::create($request->validated());
        return redirect()->route('answers.index')->with('success', 'Answer created successfully.');
    }

    public function show(Answer $answer)
    {
        return view('answers.show', compact('answer'));
    }

    public function edit(Answer $answer)
    {
        $questions = Question::all();
        return view('answers.edit', compact('answer', 'questions'));
    }

    public function update(UpdateAnswerRequest $request, Answer $answer)
    {
        $answer->update($request->validated());
        return redirect()->route('answers.index')->with('success', 'Answer updated successfully.');
    }

    public function delete(Answer $answer)
    {
        return view('answers.delete', compact('answer'));
    }

    public function destroy(Answer $answer)
    {
        $answer->delete();
        return redirect()->route('answers.index')->with('success', 'Answer deleted successfully.');
    }
}
