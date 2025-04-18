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

function generateQuestionGameEven(): array
{
    $randomNum = random_int(1, 999);
    return ['randomNum' => $randomNum];
}

function getRightAnswerGameEven(array $question): string
{
    $result = isEven($question['randomNum']) ? "yes" : "no";
    return $result; // правильный ответ обязательно в string
}

function getQuestionTextGameEven(array $question): string
{
    return "{$question['randomNum']}";
}

function launchEvenGame(): void
{
    launchEngineGame(
        fn() => getDescriptionGameEven(),
        fn() => generateQuestionGameEven(),
        fn(array $question) => getRightAnswerGameEven($question),
        fn(array $question) => getQuestionTextGameEven($question)
    );
}
