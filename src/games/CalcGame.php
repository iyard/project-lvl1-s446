<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\Play\startGame;

const TRY_MAX = 3;
define('OPERATION_DIC', array('+', '-', '*'));

function run()
{
    $rules = "What is the result of the expression?";
    $game = [];
    for ($try = 0; $try < TRY_MAX; $try++) {
        $operation = OPERATION_DIC[rand(0, 2)];
        $num1 = rand(1, 99);
        $num2 = rand(1, 99);
        $correctAnswer = calc($operation, $num1, $num2);
        $game[] = ["question" => "{$num1} {$operation} {$num2}", "correctAnswer" => $correctAnswer];
    }
    startGame($rules, $game);
}

function calc($operation, $num1, $num2)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
            break;
        case '-':
            return $num1 - $num2;
            break;
        case '*':
            return $num1 * $num2;
            break;
    }
}
