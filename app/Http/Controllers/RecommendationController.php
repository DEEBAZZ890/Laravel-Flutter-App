<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecommendationRequest;
use App\Http\Requests\UpdateRecommendationRequest;
use App\Models\Recommendation;
use App\Models\Result;

class RecommendationController extends Controller
{
    function __construct()
    {
        $this->middleware('role:lecturer|admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $recommendations = Recommendation::with('result')->paginate(10);
        return view('recommendations.index', compact('recommendations'));
    }

    public function create()
    {
        $results = Result::all();
        return view('recommendations.create', compact('results'));
    }

    public function store(StoreRecommendationRequest $request)
    {
        Recommendation::create($request->validated());
        return redirect()->route('recommendations.index')->with('success', 'Recommendation created successfully.');
    }

    public function show(Recommendation $recommendation)
    {
        return view('recommendations.show', compact('recommendation'));
    }

    public function edit(Recommendation $recommendation)
    {
        $results = Result::all();
        return view('recommendations.edit', compact('recommendation', 'results'));
    }

    public function update(UpdateRecommendationRequest $request, Recommendation $recommendation)
    {
        $recommendation->update($request->validated());
        return redirect()->route('recommendations.index')->with('success', 'Recommendation updated successfully.');
    }

    public function delete(Recommendation $recommendation)
    {
        return view('recommendations.delete', compact('recommendation'));
    }

    public function destroy(Recommendation $recommendation)
    {
        $recommendation->delete();
        return redirect()->route('recommendations.index')->with('success', 'Recommendation deleted successfully.');
    }
}
