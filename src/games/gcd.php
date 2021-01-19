<?php

namespace Brain\Games\games\gcd;

use function Brain\Games\startGame;

const GCD_GAME_LINE = 'Find the greatest common divisor of given numbers.';

function getGcd(int $a, int $b): int
{
    $res = 0;
    $biggest = $a > $b ? $a : $b;

    for ($i = 1; $i < $biggest; $i++) {
        if (($a % $i) === 0 && ($b % $i) === 0) {
            $res = $i;
        }
    }

    return $res;
}

function startGcdGame(): void
{
    $gameData = function (): array {
        $a = rand(0, 100);
        $b = rand(0, 100);

        $question = "$a $b";
        $rightAnswer = getGcd($a, $b);

        return [
            $question,
            $rightAnswer,
        ];
    };

    startGame($gameData, GCD_GAME_LINE);
}
