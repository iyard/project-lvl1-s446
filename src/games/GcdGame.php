<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Play\startGame;

const TRY_MAX = 3;

function run()
{
    $rules = "Find the greatest common divisor of given numbers.";
    $game = [];
    for ($try = 0; $try < TRY_MAX; $try++) {
        $num1 = rand(1, 99);
        $num2 = rand(1, 99);
        $question = "{$num1} {$num2}";
        $correctAnswer = gcd($num1, $num2);
        $game[] = ["question" => $question, "correctAnswer" => $correctAnswer];
    }
    startGame($rules, $game);
}

function gcd($num1, $num2)
{
    if ($num2 == 0) {
        return $num1;
    }
    return gcd($num2, $num1 % $num2);
}
