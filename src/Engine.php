<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function engineGame(callable $problemGame, callable $generateQuestion, callable $rightAnswerGame)
{
    //start
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    //условие задачи
    $problemStatement = $problemGame();
    line($problemStatement);

    $checkAnswer = true;
    $amountQuestions = 3;
    for ($i = 0; $i < $amountQuestions && $checkAnswer === true; $i++) {
        $question = $generateQuestion(); // создаем вопрос из задачи
        line("Question: {$question}"); // выводим вопрос пользователю

        $userAnswer = prompt('Your answer'); // получаем ответ от пользователя
        $rightAnswer = $rightAnswerGame($question); // получаем правильный ответ задачи
        if ($userAnswer === $rightAnswer) { // проверяем ответ
            line("Correct!"); // если правильный
            $checkAnswer = true;
        } else { // если не правильный
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
