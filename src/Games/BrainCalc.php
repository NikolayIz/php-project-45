<?php

namespace BrainGames\Games\BrainCalc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchEngineGame;

function getDescriptionGameCalc(): string
{
    return 'What is the result of the expression?';
}

function generateQuestionGameCalc(): string
{
    $numA = random_int(1, 10);
    $numB = random_int(1, 10);
    $operatorNum = random_int(1, 3);
    $operator = ' ';
    switch ($operatorNum) {
        case 1:
            $operator = '+';
            break;
        case 2:
            $operator = '-';
            break;
        case 3:
            $operator = '*';
            break;
    }
    return "{$numA} {$operator} {$numB}";
}

function getRightAnswerGameCalc(string $question): string
{
    $arrayStr = explode(' ', $question);
    $numA = (int)$arrayStr[0];
    $oper = $arrayStr[1];
    $numB = (int)$arrayStr[2];
    switch ($oper) {
        case "+":
            $result = $numA + $numB;
            break;
        case "-":
            $result = $numA - $numB;
            break;
        case "*":
            $result = $numA * $numB;
            break;
        default:
            $result = null;
    }
    return (string)$result; //тип string потому что ответ пользователя принимается в string
}

function launchCalcGame(): void
{
    launchEngineGame(
        fn() => getDescriptionGameCalc(),
        fn() => generateQuestionGameCalc(),
        fn(string $question) => getRightAnswerGameCalc($question)
    );
}
