<?php

namespace BrainGames\Games\EvenGame;

use function \cli\line;
use function BrainGames\Play\startGame;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function run()
{
    $game = function () {
        $getQuestionData = function () {
            return rand(1, 1001);
        };
        $getQuestion = function ($questionData) {
            return "{$questionData}";
        };
        $getCorrectAnswer = function ($questionData) {
            return $questionData % 2 === 0 ? "yes" : "no";
        };

        $questionData = $getQuestionData();
        $question = $getQuestion($questionData);
        $correctAnswer = $getCorrectAnswer($questionData);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };

    $result = startGame(DESCRIPTION, $game);
    line($result);
}
