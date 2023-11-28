<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Result;
use App\Models\QuizAttempt;
use App\Models\User;

class ResultController extends Controller
{
    function __construct()
    {
        $this->middleware('role:lecturer|admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $results = Result::with(['quizAttempt', 'user'])->paginate(10);
        return view('results.index', compact('results'));
    }

    public function create()
    {
        $quizAttempts = QuizAttempt::all();
        $users = User::all();
        return view('results.create', compact('quizAttempts', 'users'));
    }

    public function store(StoreResultRequest $request)
    {
        Result::create($request->validated());
        return redirect()->route('results.index')
            ->with('success', 'Result created successfully.');
    }

    public function show(Result $result)
    {
        return view('results.show', compact('result'));
    }

    public function edit(Result $result)
    {
        $quizAttempts = QuizAttempt::all();
        $users = User::all();
        return view('results.edit', compact('result', 'quizAttempts', 'users'));
    }

    public function update(UpdateResultRequest $request, Result $result)
    {
        $result->update($request->validated());
        return redirect()->route('results.index')
            ->with('success', 'Result updated successfully.');
    }

    public function delete(Result $result)
    {
        return view('results.delete', compact('result'));
    }

    public function destroy(Result $result)
    {
        $result->delete();
        return redirect()->route('results.index')
            ->with('success', 'Result deleted successfully.');
    }
}
