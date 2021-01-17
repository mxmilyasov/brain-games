<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function start(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $countRightAnswer = 0;
    while ($countRightAnswer < 3) {
        $random = rand(0, 20);
        line('Question: %s', $random);
        $answer = prompt('Your answer: ', '', '');

        if (isEven($random)) {
            if ($answer === 'yes') {
                line('Correct!');
                $countRightAnswer++;
            } elseif ($answer === 'no') {
                line('\'%s\' is wrong answer ;(. Correct answer was \'yes\'', $answer);
                line('Let\'s try again, %s!', $name);
                $countRightAnswer = 0;
            } else {
                line('\'%s\' is wrong answer ;(. Correct answer was \'yes\'', $answer);
                line('Let\'s try again, %s!', $name);
                $countRightAnswer = 0;
            }
        } else {
            if ($answer === 'no') {
                line('Correct!');
                $countRightAnswer++;
            } elseif ($answer === 'yes') {
                line('\'%s\' is wrong answer ;(. Correct answer was \'no\'', $answer);
                line('Let\'s try again, %s!', $name);
                $countRightAnswer = 0;
            } else {
                line('\'%s\' is wrong answer ;(. Correct answer was \'no\'', $answer);
                line('Let\'s try again, %s!', $name);
                $countRightAnswer = 0;
            }
        }
    }

    line('Congratulations, %s!', $name);
}
