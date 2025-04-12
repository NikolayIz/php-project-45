<?php

namespace BrainGames\Games\BrainProgression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\engineGame;

function problemGameProgression()
{
    return 'What number is missing in the progression?';
}

function creatingProgression()
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

function generateQuestionProgression()
{
    $array = creatingProgression();
    $countArray = count($array);
    $emptyNum = random_int(0, $countArray - 1);
    $array[$emptyNum] = '..';
    $stringFromArray = implode(' ', $array);
    $result = $stringFromArray;
    return $result;
}

function rightAnswerGameProgression($stringVal)
{
    $array = explode(' ', $stringVal);
    $indexHideElement = array_search('..', $array);
    $stepProgress = 0;
    switch ($indexHideElement) {
        case 0:
            $stepProgress = (int)$array[2] - (int)$array[1];
            break;
        case 1:
            $stepProgress = (int)$array[3] - (int)$array[2];
            break;
        default:
            $stepProgress = (int)$array[1] - (int)$array[0];
    }
    if ($indexHideElement === 0) {
        $result = $array[1] - $stepProgress;
    } else {
        $previousIndex = $indexHideElement - 1;
        $result = $array[$previousIndex] + $stepProgress;
    }

    return (string)$result; //тип string потому что ответ пользователя принимается в string
}

function progressionGame()
{
    engineGame(
        'BrainGames\\Games\\BrainProgression\\problemGameProgression',
        'BrainGames\\Games\\BrainProgression\\generateQuestionProgression',
        'BrainGames\\Games\\BrainProgression\\rightAnswerGameProgression'
    );
}
