<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\Play\startGame;

const DESCRIPTION = "What is the result of the expression?";
const OPERATION_DIC = ['+', '-', '*'];

function run()
{
    $game = function () {
        $num1 = rand(1, 99);
        $num2 = rand(1, 99);
        $operation = OPERATION_DIC[rand(0, 2)];
        $question = "{$num1} {$operation} {$num2}";
        $getCorrectAnswer = function ($num1, $num2, $operation) {
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
        };
        $correctAnswer = $getCorrectAnswer($num1, $num2, $operation);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };
    startGame(DESCRIPTION, $game);
}
