<?php

namespace BrainGames\EvenGame;

use function \cli\line;
use function \cli\prompt;

const TRY_MAX = 3;

function run()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($try = 0; $try < TRY_MAX; $try++) {
        $question = rand(1, 1001);
        line("Question: %s", $question);
        $answer = prompt('Your answer');
        $correctAnswer = getCorrectAnswer($question);
        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $correctAnswer);
            return line('Let\'s try again, Bill!');
        }
        line('Correct!');
    }
    return line("Congratulations, %s!", $name);
}
function isEven($num)
{
    return $num % 2 === 0;
}
function getCorrectAnswer($num)
{
    return isEven($num) ? "yes" : "no";
}
