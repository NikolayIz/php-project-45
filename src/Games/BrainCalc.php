<?php

namespace BrainGames\Games\BrainCalc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchEngineGame;

function getDescriptionGameCalc(): string
{
    return 'What is the result of the expression?';
}

function calculateExpression(int $num1, string $operator, int $num2): ?int
{
    switch ($operator) {
        case "+":
            return $num1 + $num2;
            break;
        case "-":
            return $num1 - $num2;
            break;
        case "*":
            return $num1 * $num2;
            break;
        default:
            return null;
    }
}

function generateQuestionGameCalc(): array
{
    $num1 = random_int(1, 10);
    $num2 = random_int(1, 10);
    $operatorNum = random_int(1, 3);
    $operator = match ($operatorNum) {
        1 => '+',
        2 => '-',
        3 => '*',
    };
    $result = ['num1' => $num1, 'num2' => $num2, 'operator' => $operator];
    return $result;
}

function getRightAnswerGameCalc(array $question): string
{
    $num1 = $question['num1'];
    $operator = $question['operator'];
    $num2 = $question['num2'];
    return (string)calculateExpression($num1, $operator, $num2); // правильный ответ обязательно в string
}

function getQuestionTextGameCalc(array $question): string
{
    return "{$question['num1']} {$question['operator']} {$question['num2']}";
}

function launchCalcGame(): void
{
    launchEngineGame(
        fn() => getDescriptionGameCalc(),
        fn() => generateQuestionGameCalc(),
        fn(array $question) => getRightAnswerGameCalc($question),
        fn(array $question) => getQuestionTextGameCalc($question)
    );
}
