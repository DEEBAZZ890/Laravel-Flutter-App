<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    public function run()
    {
        $questions = Question::with('quiz')->get();

        foreach ($questions as $question) {
            switch ($question->type) {
                case 'multiple_choice':
                    $this->createMultipleChoiceAnswers($question);
                    break;

                case 'true_false':
                    $this->createTrueFalseAnswers($question);
                    break;

                case 'short_answer':
                    $this->createShortAnswer($question);
                    break;
            }
        }
    }

    private function createMultipleChoiceAnswers($question)
    {
        $correctAnswerIndex = rand(0, 3); // Random index for correct answer

        for ($i = 0; $i < 4; $i++) {
            Answer::create([
                'question_id' => $question->id,
                'content' => "Option " . chr(65 + $i), // Options A, B, C, D
                'is_correct' => $i === $correctAnswerIndex,
            ]);
        }
    }

    private function createTrueFalseAnswers($question)
    {
        $correctAnswer = (bool)rand(0, 1); // Randomly select true or false

        Answer::create([
            'question_id' => $question->id,
            'content' => 'True',
            'is_correct' => $correctAnswer === true,
        ]);

        Answer::create([
            'question_id' => $question->id,
            'content' => 'False',
            'is_correct' => $correctAnswer === false,
        ]);
    }

    private function createShortAnswer($question)
    {
        Answer::create([
            'question_id' => $question->id,
            'content' => "Sample answer for short answer question",
            'is_correct' => true,
        ]);
    }
}

