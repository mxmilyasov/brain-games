<?php

namespace Brain\Games;

use function cli\err;
use function cli\line;
use function cli\prompt;

const GAME_ROUND = 3;

function startGame($gameData, $gameLine)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    line($gameLine);

    $rightAnswerCounter = 0;
    while ($rightAnswerCounter < GAME_ROUND) {
        [$question, $rightAnswer] = $gameData();
        line("Question: $question");
        $answer = prompt('Your answer');

        if ($answer != $rightAnswer) {
            err("'$answer' is wrong answer ;(. Correct answer was '$rightAnswer'.");
            line("Let's try again, $name!");
            $rightAnswerCounter = 0;
        } else {
            line('Correct!');
            $rightAnswerCounter++;
        }
    }

    line('Congratulations, %s!', $name);
}
