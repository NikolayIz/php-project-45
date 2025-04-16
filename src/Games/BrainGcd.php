<?php

namespace BrainGames\Games\BrainGcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchEngineGame;

function problemGameGcd(): string
{
    $textProblem = 'Find the greatest common divisor of given numbers.';
    return $textProblem;
}

function generateQuestionGcd(): string
{
    $numA = random_int(1, 100);
    $numB = random_int(1, 100);
    return "{$numA} {$numB}";
}

function rightAnswerGameGcd(string $stringVal): string
{
    $arrayStr = explode(' ', $stringVal);
    $a = (int)$arrayStr[0];
    $b = (int)$arrayStr[1];
    $c = 0; //промежуточная переменная
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
        'BrainGames\\Games\\BrainGcd\\problemGameGcd',
        'BrainGames\\Games\\BrainGcd\\generateQuestionGcd',
        'BrainGames\\Games\\BrainGcd\\rightAnswerGameGcd'
    );
}
