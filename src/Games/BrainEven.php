<?php

namespace BrainGames\Games\BrainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchEngineGame;

function isEven(int $number): bool
{
    $result = $number % 2 === 0;
    return $result;
}

function getDescriptionGameEven(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function generateQuestionGameEven(): int
{
    $randomNum = random_int(1, 999);
    return $randomNum;
}

function getRightAnswerGameEven(int $question): string
{
    $result = isEven($question) ? "yes" : "no";
    return $result;
}

function launchEvenGame(): void
{
    launchEngineGame(
        fn() => getDescriptionGameEven(),
        fn() => generateQuestionGameEven(),
        fn(string $question) => getRightAnswerGameEven($question)
    );
}
