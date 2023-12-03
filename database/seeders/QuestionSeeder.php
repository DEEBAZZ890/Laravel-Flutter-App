<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Sample programming-related questions for each type
        $multipleChoiceQuestions = [
            'What does HTML stand for?',
            'Which language is used for styling web pages?',
            'Which is not a JavaScript Framework?',
            'Which language runs in a web browser?',
            'What does SQL stand for?',
            'What is the correct HTML element for inserting a line break?',
            'What is the correct syntax for referring to an external script called "xxx.js"?',
            'How do you write "Hello World" in an alert box?',
            'What is the correct way to write a JavaScript array?',
            'Which event occurs when the user clicks on an HTML element?',
            'How do you declare a JavaScript variable?',
            'Which operator is used to assign a value to a variable?',
            'What will the following code return: Boolean(10 > 9)?',
            'Is JavaScript case-sensitive?',
            'Which HTML attribute is used to define inline styles?',
            'Which property is used to change the background color?',
            'Which CSS property controls the text size?',
            'How do you make each word in a text start with a capital letter?',
            'Which property is used to change the font of an element?',
            'How do you select elements with class name "test" in CSS?',
        ];

        $trueFalseQuestions = [
            'PHP is a client-side scripting language.',
            'MySQL is a type of relational database.',
            'The "C" in CSS stands for "Control".',
            'HTML tags are case-sensitive.',
            'JavaScript can be used to modify the content of an HTML page.',
            'Python is strictly a statically-typed language.',
            'Django is a JavaScript framework.',
            'React is a front-end JavaScript library.',
            'Variables in Python are declared using the "var" keyword.',
            'Java and JavaScript are the same.',
            'Flutter is used for mobile application development.',
            'Vue.js is a full-stack framework.',
            'The main purpose of Bootstrap is to create responsive layouts.',
            'An API is a set of commands for interacting with a software application.',
            'AJAX stands for Asynchronous JavaScript and XML.',
            'React Native is used for building desktop applications.',
            'Node.js is a browser-based runtime environment.',
            'CSS can be used to add animations to web pages.',
            'Swift is a programming language used for developing iOS applications.',
            'Ruby on Rails is a programming language.',
        ];

        $shortAnswerQuestions = [
            'What is the command to install a new package using npm?',
            'Which keyword is used to define a variable in JavaScript?',
            'Name a popular Python web framework.',
            'What is the purpose of Git?',
            'What does the acronym API stand for?',
            'What is the primary use of MongoDB?',
            'Name a popular tool for containerization.',
            'What language is primarily used for Android development?',
            'Which language is known for its use in data science and machine learning?',
            'What does MVC stand for in software development?',
            'Name the default port for running a local development server in React.',
            'What is the command to create a new React application?',
            'Name a database management system used in web development.',
            'What is the primary use of TypeScript?',
            'What is the purpose of a CDN in web development?',
            'What is the name of the command-line tool used by Vue.js?',
            'What does ORM stand for in the context of programming?',
            'What is the main use of Docker?',
            'Name a tool used for Continuous Integration/Continuous Deployment.',
            'What is the term for the process of tracking and managing changes in software code?',
        ];

        // Retrieve all quizzes
        $quizzes = Quiz::all();

        foreach ($quizzes as $quiz) {
            for ($i = 1; $i <= 20; $i++) { // 20 questions per quiz
                // Array of question types
                $questionTypes = ['multiple_choice', 'true_false', 'short_answer'];
                // Get a random question type
                $type = $questionTypes[array_rand($questionTypes)];

                // Pick a random question based on the type
                $questionContent = '';
                if ($type == 'multiple_choice') {
                    $questionContent = $multipleChoiceQuestions[array_rand($multipleChoiceQuestions)];
                } elseif ($type == 'true_false') {
                    $questionContent = $trueFalseQuestions[array_rand($trueFalseQuestions)];
                } elseif ($type == 'short_answer') {
                    $questionContent = $shortAnswerQuestions[array_rand($shortAnswerQuestions)];
                }

                Question::create([
                    'quiz_id' => $quiz->id,
                    'content' => $questionContent,
                    'type' => $type,
                    'points' => 1 // Each question is worth 1 point
                ]);
            }
        }
    }
}
