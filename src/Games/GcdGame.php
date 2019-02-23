<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Play\startGame;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function run()
{
    $game = function () {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        $question = "{$num1} {$num2}";
        $correctAnswer = getGcd ($num1, $num2);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };
    startGame(DESCRIPTION, $game);
}

function getGcd ($num1, $num2) {
    return $num2 ? getGcd($num2, $num1 % $num2) : $num1;
}