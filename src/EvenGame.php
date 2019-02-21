<?php

namespace BrainGames\EvenGame;

use function \cli\line;
use function \cli\prompt;

const TRY_MAX = 3;

function run ()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($try = 0; $try < TRY_MAX; $try++) {
        $num = rand(1, 1001);
        line("Question: %s", $num);
        $answer = prompt('Your answer');
        $correctAnswer = getCorrectAnswer($num);
        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $correctAnswer);
            line('Let\'s try again, Bill!');
            break;
        }
        line('Correct!');
    }
    if ($try == TRY_MAX) {
        line("Congratulations, %s!", $name);
    }
}
function isEven($num)
{
    return $num % 2 === 0;
}
function getCorrectAnswer($num)
{
    return isEven($num) ? "yes" : "no";
}
