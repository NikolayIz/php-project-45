<?php

namespace BrainGames\Games\BrainProgression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\launchEngineGame;

function getDescriptionGameProgression(): string
{
    return 'What number is missing in the progression?';
}

function creatingProgression(): array
{
    $arrayProgression = [];
    $start = random_int(1, 20);
    $countIndex = random_int(5, 12);
    $step = random_int(1, 5);
    $currentElement = 0;
    for ($i = 0; $i < $countIndex * $step; $i += $step) {
        $currentElement = $start + $i;
        $arrayProgression[] = $currentElement;
    }
    return $arrayProgression;
}

function generateQuestionGameProgression(): array
{
    $arrayProgression = creatingProgression();
    $countArray = count($arrayProgression);
    if ($countArray > 5) {
        $emptyNum = random_int(0, $countArray - 1);
    } else {
        $emptyNum = null;
    }
    $arrayProgression[$emptyNum] = '..';
    return $arrayProgression;
}

function getRightAnswerGameProgression(array $question): string
{
    $indexHideElement = array_search('..', $question, true);
    $stepProgress = 0;
    switch ($indexHideElement) {
        case 0:
            $stepProgress = (int)$question[2] - (int)$question[1];
            break;
        case 1:
            $stepProgress = (int)$question[3] - (int)$question[2];
            break;
        default:
            $stepProgress = (int)$question[1] - (int)$question[0];
    }
    if ($indexHideElement === 0) {
        $result = (int)$question[1] - $stepProgress;
    } else {
        $previousIndex = (int)$indexHideElement - 1;
        $result = (int)$question[$previousIndex] + $stepProgress;
    }

    return (string)$result; //тип string потому что ответ пользователя принимается в string
}

function getQuestionTextGameProgression(array $question): string
{
    return implode(' ', $question);
}
function launchProgressionGame(): void
{
    launchEngineGame(
        fn() => getDescriptionGameProgression(),
        fn() => generateQuestionGameProgression(),
        fn(array $question) => getRightAnswerGameProgression($question),
        fn(array $question) => getQuestionTextGameProgression($question)
    );
}
