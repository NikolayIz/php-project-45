<?php

namespace BrainGames\Games\BrainPrime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchEngineGame;

function getDescriptionGamePrime(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function generateQuestionPrime(): int
{
    $result = random_int(1, 99);
    return $result;
}

function getRightAnswerGamePrime(int $question): string
{
    if ($question < 2) {
        return 'no';
    } elseif ($question === 2) {
        return  'yes';
    } elseif (($question % 2) === 0) {
        return  'no';
    }
    $sqrtNum = sqrt($question);
    for ($i = 3; $i <= $sqrtNum; $i++) {
        $currentNum = $i;
        if ($num % $currentNum === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function launchPrimeGame(): void
{
    launchEngineGame(
        fn() => getDescriptionGamePrime(),
        fn() => generateQuestionGamePrime(),
        fn(string $question) => getRightAnswerGamePrime($question)
    );
}
