<?php

namespace Brain\Games\games\prime;

use function Brain\Games\startGame;

const PRIME_GAME_LINE = "Answer 'yes' if given number is prime. Otherwise answer 'no'";

function isPrime(int $num): bool
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2, $sqrt = sqrt($num); $i <= $sqrt; $i++) {
        if (($num % $i) == 0) {
            return false;
        }
    }

    return true;
}

function startPrimeGame(): void
{
    $gameData = function (): array {
        $question = rand(0, 20);
        $rightAnswer = isPrime($question) ? 'yes' : 'no';
        return [
            $question,
            $rightAnswer,
        ];
    };

    startGame($gameData, PRIME_GAME_LINE);
}
