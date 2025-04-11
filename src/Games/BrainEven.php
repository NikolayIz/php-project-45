<?php

namespace BrainGames\Games\BrainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\engineGame;

function isEven($number)
{
    return $number % 2 === 0;
}

function problemGameEven()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function generateQuestionEven()
{
    $randomNum = random_int(1, 999);
    return $randomNum;
}

function rightAnswerGameEven(int $num): string
{
    return isEven($num) ? "yes" : "no";
}

function evenGame()
{
    engineGame(
        'BrainGames\\Games\\BrainEven\\problemGameEven',
        'BrainGames\\Games\\BrainEven\\generateQuestionEven',
        'BrainGames\\Games\\BrainEven\\rightAnswerGameEven'
    );
}
