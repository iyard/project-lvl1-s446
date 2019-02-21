<?php

namespace BrainGames\Play;

use function \cli\line;
use function \cli\prompt;

function startGame ($rules, $game)
{
    line('Welcome to the Brain Game!');
    line($rules);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    foreach($game as $question) {
        line("Question: %s", $question['question']);
        $answer = prompt('Your answer');
        $correctAnswer = $question['correctAnswer'];
        if ($answer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $correctAnswer);
            return line("Let's try again, %s!", $name);
        }
    }
    return line("Congratulations, %s!", $name);
}
