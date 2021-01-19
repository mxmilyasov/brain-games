<?php

namespace Brain\Games\games\progression;

use function Brain\Games\startGame;

const PROGRESSION_GAME_LINE = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function getProgression($num, $diff, $length): array
{
    $res = [];
    for ($i = 0; $i < $length; $i++) {
        $res[] = $num;
        $num += $diff;
    }

    $randomIndex = rand(0, count($res) - 1);
    $missing = $res[$randomIndex];
    $res[$randomIndex] = '..';

    return [
        'progression' => implode(' ', $res),
        'missing' => $missing
    ];
}

function startProgressionGame()
{
    $gameData = function () {
        $progressionStartNum = rand(1, 100);
        $progressionDifference = rand(1, 10);

        $progression = getProgression($progressionStartNum, $progressionDifference, PROGRESSION_LENGTH);
        $question = $progression['progression'];
        $rightAnswer = $progression['missing'];

        return [$question, $rightAnswer];
    };
    startGame($gameData, PROGRESSION_GAME_LINE);
}
