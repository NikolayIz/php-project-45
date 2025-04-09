<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;

function isEven($number)
{
    return $number % 2 === 0;
}

function rightAnswerEvenGame(int $num): string
{
    return isEven($num) ? "yes" : "no";
}

function evenGame()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $checkAnswer = true;
    $amountQuestions = 3;
    for ($i = 0; $i < $amountQuestions && $checkAnswer === true; $i++) {
        $randomNum = random_int(1, 999); #создаем рандомное число
        line("Question: {$randomNum}"); #выводим число пользователю
        $userAnswer = prompt('Your answer'); #получаем ответ
        $rightAnswer = rightAnswerEvenGame($randomNum);
        if ($rightAnswer === $userAnswer) { #проверяем ответ
            line("Correct!"); #если правильный
            $checkAnswer = true;
        } else { #если не правильный
            $message = "'{$userAnswer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'." . PHP_EOL;
            $message .= "Let's try again, {$name}!";
            line($message);
            $checkAnswer = false;
        }
    }
    //если ответы были все три раза правильные, кидаем респект юзеру
    if ($checkAnswer === true) {
        line("Congratulations, %s!", $name);
    }
}
