<?php

namespace BrainGames\Games\BrainPrime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchEngineGame;

function getDescriptionGamePrime(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function generateQuestionGamePrime(): array
{
    $randomNum = random_int(1, 99);
    return ["randomNum" => $randomNum];
}

function getRightAnswerGamePrime(array $question): string
{
    $num = $question["randomNum"];
    if ($num < 2) {
        return 'no';
    } elseif ($num === 2) {
        return  'yes';
    } elseif (($num % 2) === 0) {
        return  'no';
    }
    $sqrtNum = sqrt($num);
    for ($i = 3; $i <= $sqrtNum; $i++) {
        $currentNum = $i;
        if ($num % $currentNum === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function getQuestionTextGamePrime(array $question): string
{
    return "{$question["randomNum"]}";
}

function launchPrimeGame(): void
{
    launchEngineGame(
        fn() => getDescriptionGamePrime(),
        fn() => generateQuestionGamePrime(),
        fn(array $question) => getRightAnswerGamePrime($question),
        fn(array $question) => getQuestionTextGamePrime($question)
    );
}
