<?php

namespace BrainGames\Games\CalcGame;

use function BrainGames\Play\startGame;

const OPERATION_DIC = ['+', '-', '*'];

function run()
{
    $description = "What is the result of the expression?";
    $getQuestionData = function () {
        $operation = OPERATION_DIC[rand(0, 2)];
        $num1 = rand(1, 99);
        $num2 = rand(1, 99);
        return ['operation' => $operation, 'num1' => $num1, 'num2' => $num2];
    };
    $getQuestion = function ($questionData) {
        return "{$questionData['num1']} {$questionData['operation']} {$questionData['num2']}";
    };
    $getCorrectAnswer = function ($questionData) {
        $num1 = $questionData['num1'];
        $num2 = $questionData['num2'];
        switch ($questionData['operation']) {
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
    
    startGame($description, $getQuestionData, $getQuestion, $getCorrectAnswer);
}
