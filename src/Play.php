<?php

namespace BrainGames\Play;

use function \cli\line;
use function \cli\prompt;

const TRY_MAX = 3;

function startGame($description, $game)
{
    line('Welcome to the Brain Game!');
    line($description);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    for ($try = 0; $try < TRY_MAX; $try++) {
        ['question' => $question, 'correctAnswer' => $correctAnswer] = $game();
        line("Question: %s", $question);
        $answer = prompt('Your answer');
        if ($answer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $answer, $correctAnswer);
            line("Let's try again, %s", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
