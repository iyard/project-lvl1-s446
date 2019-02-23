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
        for ($i = 0; $i < PROGRESSION_LEN; $i++) {
            $progression[] = $progressionStart + $rate * $i;
        }
        $hiddenElementIndex = rand(0, PROGRESSION_LEN - 1);
        $correctAnswer = $progression[$hiddenElementIndex];
        $progression[$hiddenElementIndex] = "..";
        $question = implode(" ", $progression);
        return ['question' => $question, 'correctAnswer' => $correctAnswer];
    };
    startGame(DESCRIPTION, $game);
}
