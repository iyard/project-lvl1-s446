<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\Play\startGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{
    $game = function () {
        $questionData = rand(2, 100);
        $question = "{$questionData}";
        $correctAnswer = isPrime($questionData) ? "yes" : "no";
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };
    startGame(DESCRIPTION, $game);
}

function IsPrime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i < $num / 2; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}
