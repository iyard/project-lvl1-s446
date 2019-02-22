<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Play\startGame;

function run()
{
    $description = "Answer \"yes\" if number even otherwise answer \"no\".";
    $getQuestionData = function () {
        return rand(1, 1001);
    };
    $getQuestion = function ($questionData) {
        return "{$questionData}";
    };
    $getCorrectAnswer = function ($questionData) {
        return $questionData % 2 === 0 ? "yes" : "no";
    };
    
    startGame($description, $getQuestionData, $getQuestion, $getCorrectAnswer);
}
