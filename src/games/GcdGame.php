<?php

namespace BrainGames\Games\GcdGame;

use function BrainGames\Play\startGame;

const TRY_MAX = 3;

function run()
{
    $description = "Find the greatest common divisor of given numbers.";
    $getQuestionData = function () {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        return ['num1' => $num1, 'num2' => $num2];
    };
    $getQuestion = function ($questionData) {
        return "{$questionData['num1']} {$questionData['num2']}";
    };
    $getCorrectAnswer = function ($questionData) {
        $num1 = $questionData['num1'];
        $num2 = $questionData['num2'];
        $getGcd = function ($num1, $num2) use (&$getGcd) {
            return $num2 ? $getGcd($num2, $num1 % $num2) : $num1;
        };
        return $getGcd($num1, $num2);
    };
    
    startGame($description, $getQuestionData, $getQuestion, $getCorrectAnswer);
}
