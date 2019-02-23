<?php

namespace BrainGames\Games\EvenGame;

use function BrainGames\Play\startGame;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $game = function () {
        $questionData = rand(1, 1001);
        $question = "{$questionData}";
        $getCorrectAnswer = function ($questionData) {
            return isEven($questionData) ? "yes" : "no";
        };
        $correctAnswer = $getCorrectAnswer($questionData);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };
    startGame(DESCRIPTION, $game);
}

function isEven ($num) {
    return $num % 2 == 0;
}