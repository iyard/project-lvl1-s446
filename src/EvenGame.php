<?php

namespace BrainGames\EvenGame;

use function \cli\line;
use function \cli\prompt;

function run ()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $try = 0;

    do {
        $try++;
        $num = rand(1, 1001);
        line("Question: %s", $num);
        $answer = prompt('Your answer');
        if (!isCorrectAnswer($num, $answer)) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, getCorrectAnswer($num));
            line('Let\'s try again, Bill!');
            break;
        }
        line('Correct!');
    } while ($try < 3);
    if ($try == 3) {
        line("Congratulations, %s!", $name);
    }
}

function isCorrectAnswer($num, $answer)
{
    if ((isEven($num) == true && $answer == 'yes') or (isEven($num) == false && $answer == 'no')) {
        return true;
    }
    return false;
}
function isEven($num)
{
    return $num % 2 === 0;
}
function getCorrectAnswer($num)
{
    if (isEven($num)) {
        return "yes";
    }
    return "no";
}
