<?php

namespace BrainGames\Games\BrainGcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\engineGame;

function problemGameGcd()
{
    // return 'What is the result of the expression?';
}

function generateQuestionGcd()
{
    // $numA = random_int(1, 10);
    // $numB = random_int(1, 10);
    // $operatorNum = random_int(1, 3);
    // $operator = '?';
    // switch ($operatorNum) {
    //     case 1:
    //         $operator = '+';
    //         break;
    //     case 2:
    //         $operator = '-';
    //         break;
    //     case 3:
    //         $operator = '*';
    //         break;
    // }
    // return "{$numA} {$operator} {$numB}";
}

function rightAnswerGameGcd($stringVal)
{
    // $arrayStr = explode(' ', $stringVal);
    // $numA = (int)$arrayStr[0];
    // $oper = $arrayStr[1];
    // $numB = (int)$arrayStr[2];
    // switch ($oper) {
    //     case "+":
    //         $result = $numA + $numB;
    //         break;
    //     case "-":
    //         $result = $numA - $numB;
    //         break;
    //     case "*":
    //         $result = $numA * $numB;
    //         break;
    // }
    // return (string)$result; //тип string потому что ответ пользователя принимается в string
}

function gcdGame()
{
    engineGame(
        'BrainGames\\Games\\BrainGcd\\problemGameGcd',
        'BrainGames\\Games\\BrainGcd\\generateQuestionGcd',
        'BrainGames\\Games\\BrainGcd\\rightAnswerGameGcd'
    );
}
