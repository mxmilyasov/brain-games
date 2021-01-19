<?php

namespace Brain\Games\games\calc;

use function Brain\Games\startGame;

const CALC_GAME_LINE = 'What is the result of the expression?';

function getOperator(): string
{
    $operators = ['-', '+', '*'];
    shuffle($operators);
    return $operators[0];
}

function calculateExpression($operator, $leftOperand, $rightOperand): int
{
    switch ($operator) {
        case $operator === '+':
            return $leftOperand + $rightOperand;
        case $operator === '-':
            return $leftOperand - $rightOperand;
        case $operator === '*':
            return $leftOperand * $rightOperand;
    }
    return 0;
}

function startCalcGame()
{
    $gameData = function () {
        $leftOperand = rand(0, 10);
        $rightOperand = rand(0, 10);
        $operator = getOperator();

        $question = "{$leftOperand} {$operator} {$rightOperand}";
        $rightAnswer = calculateExpression($operator, $leftOperand, $rightOperand);
        return [$question, $rightAnswer];
    };
    startGame($gameData, CALC_GAME_LINE);
}
