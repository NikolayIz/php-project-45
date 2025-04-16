<?php

namespace BrainGames\Games\BrainGcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchEngineGame;

function getDescriptionGameGcd(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function generateQuestionGameGcd(): string
{
    $numA = random_int(1, 100);
    $numB = random_int(1, 100);
    return "{$numA} {$numB}";
}

function getRightAnswerGameGcd(string $question): string
{
    $arrayStr = explode(' ', $question);
    $a = (int)$arrayStr[0];
    $b = (int)$arrayStr[1];
    $temp = 0; //промежуточная переменная
    //алгоритм Евклида by Nikolay Gagarinov:
    $result = $a;
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
        $result = $a;
    }
    return (string)$result; //тип string потому что ответ пользователя принимается в string
}

function launchGcdGame(): void
{
    launchEngineGame(
        fn() => getDescriptionGameGcd(),
        fn() => generateQuestionGameGcd(),
        fn(string $question) => getRightAnswerGameGcd($question)
    );
}
