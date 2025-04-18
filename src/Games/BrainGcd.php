<?php

namespace BrainGames\Games\BrainGcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchEngineGame;

function getDescriptionGameGcd(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

function generateQuestionGameGcd(): array
{
    $num1 = random_int(1, 100);
    $num2 = random_int(1, 100);
    return ['num1' => $num1, 'num2' => $num2];
}

function getRightAnswerGameGcd(array $question): string
{
    $a = $question['num1'];
    $b = $question['num2'];
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

function getQuestionTextGameGcd(array $question): string
{
    return "{$question['num1']} {$question['num2']}";
}

function launchGcdGame(): void
{
    launchEngineGame(
        fn() => getDescriptionGameGcd(),
        fn() => generateQuestionGameGcd(),
        fn(array $question) => getRightAnswerGameGcd($question),
        fn(array $question) => getQuestionTextGameGcd($question)
    );
}
