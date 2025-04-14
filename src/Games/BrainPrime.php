<?php

namespace BrainGames\Games\BrainPrime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\engineGame;

function problemGamePrime()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function generateQuestionPrime()
{
    $result = random_int(1, 99);
    return (int) $result;
}

function rightAnswerGamePrime($num)
{
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

function primeGame()
{
    engineGame(
        'BrainGames\\Games\\BrainPrime\\problemGamePrime',
        'BrainGames\\Games\\BrainPrime\\generateQuestionPrime',
        'BrainGames\\Games\\BrainPrime\\rightAnswerGamePrime'
    );
}
