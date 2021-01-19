<?php

namespace Brain\Games\games\even;

use function Brain\Games\startGame;

const EVEN_GAME_LINE = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return ($number % 2) === 0;
}


function startEvenGame(): void
{
    $gameData = function (): array {
        $question = rand(0, 99);
        $rightAnswer = isEven($question) ? 'yes' : 'no';
        return [
            $question,
            $rightAnswer,
        ];
    };

    startGame($gameData, EVEN_GAME_LINE);
}
