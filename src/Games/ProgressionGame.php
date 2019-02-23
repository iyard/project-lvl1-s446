<?php

namespace BrainGames\Games\ProgressionGame;

use function BrainGames\Play\startGame;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LEN = 10;

function run()
{
    $game = function () {
        $progression = [];
        $rate = rand(1, 10);
        $progressionStart = rand(1, 10);
        $progression[0] = $progressionStart;
        for ($i = 1; $i < PROGRESSION_LEN; $i++) {
            $progression[$i] = $progression[$i - 1] + $rate;
        }
        $missingIndex = rand(0, PROGRESSION_LEN - 1);
        $correctAnswer = $progression[$missingIndex];
        $progression[$missingIndex] = "..";
        $question = implode(" ", $progression);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };
    startGame(DESCRIPTION, $game);
}
