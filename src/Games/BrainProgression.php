<?php

namespace BrainGames\Games\BrainProgression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\engineGame;

// function problemGameProgression()
// {
//     return 'Find the greatest common divisor of given numbers.';
// }

// function generateQuestionProgression()
// {
//     $numA = random_int(1, 100);
//     $numB = random_int(1, 100);
//     return "{$numA} {$numB}";
// }

// function rightAnswerGameProgression($stringVal)
// {
//     $arrayStr = explode(' ', $stringVal);
//     $a = (int)$arrayStr[0];
//     $b = (int)$arrayStr[1];
//     $c = 0; //промежуточная переменная
//     //алгоритм Евклида by Nikolay Gagarinov (респект за подсказку):
//     $result = $a;
//     while ($b !== 0) {
//         $c = $b;
//         $b = $a % $b;
//         $a = $c;
//         $result = $a;
//     }
//     return (string)$result; //тип string потому что ответ пользователя принимается в string
// }

function progressionGame()
{
    engineGame(
        'BrainGames\\Games\\BrainProgression\\problemGameProgression',
        'BrainGames\\Games\\BrainProgression\\generateQuestionProgression',
        'BrainGames\\Games\\BrainProgression\\rightAnswerGameProgression'
    );
}