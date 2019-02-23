<?php

namespace BrainGames\Games\PrimeGame;

use function BrainGames\Play\startGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function run()
{
    $game = function () {
        $questionData = rand(2, 100);
        $question = "{$questionData}";
        $getCorrectAnswer = function ($questionData) {
            return isPrime($questionData) ? "yes" : "no";
        };
        $correctAnswer = $getCorrectAnswer($questionData);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };
    startGame(DESCRIPTION, $game);
}

function IsPrime($num)
{
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}
