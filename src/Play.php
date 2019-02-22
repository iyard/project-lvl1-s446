<?php

namespace BrainGames\Play;

use function \cli\line;
use function \cli\prompt;

const TRY_MAX = 3;

function startGame($description, $getQuestionData, $getQuestion, $getCorrectAnswer)
{
    line('Welcome to the Brain Game!');
    line($description);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($try = 0; $try < TRY_MAX; $try++) {
        $questionData = $getQuestionData();
        line("Question: %s", $getQuestion($questionData));
        $answer = prompt('Your answer');
        $correctAnswer = $getCorrectAnswer($questionData);
        if ($answer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return false;
        }
    }
    line("Congratulations, %s!", $name);
    return true;
}
