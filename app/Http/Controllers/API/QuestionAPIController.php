<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\StoreQuestionAPIRequest;
use App\Http\Requests\UpdateQuestionAPIRequest;
use App\Models\Question;

class QuestionAPIController extends ApiBaseController
{
    public function index()
    {
        $questions = Question::paginate(10);
        return $this->sendResponse($questions, "Questions retrieved successfully.");
    }

    public function store(StoreQuestionAPIRequest $request)
    {
        $validatedData = $request->validated();
        $question = Question::create($validatedData);
        return $this->sendResponse($question, "Question created successfully.");
    }

    public function show($id)
    {
        $question = Question::find($id);
        if (!$question) {
            return $this->sendError("Question not found.");
        }
        return $this->sendResponse($question, "Question retrieved successfully.");
    }

    public function update(UpdateQuestionAPIRequest $request, $id)
    {
        $question = Question::find($id);
        if (!$question) {
            return $this->sendError("Question not found.");
        }

        $validatedData = $request->validated();
        $question->update($validatedData);
        return $this->sendResponse($question, "Question updated successfully.");
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        if (!$question) {
            return $this->sendError("Question not found.");
        }

        $question->delete();
        return $this->sendResponse([], "Question deleted successfully.");
    }
}
