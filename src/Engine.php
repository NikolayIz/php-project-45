<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function launchEngineGame(callable $problemGame, callable $generateQuestion, callable $rightAnswerGame): void
{
    //start
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    //условие задачи
    $problemStatement = $problemGame();
    line($problemStatement);

    $checkAnswer = true;
    $questionCount = 3;
    for ($i = 0; $i < $questionCount && $checkAnswer === true; $i++) {
        $question = $generateQuestion(); // создаем вопрос из задачи
        line("Question: {$question}"); // выводим вопрос пользователю

        $userAnswer = prompt('Your answer'); // получаем ответ от пользователя
        $rightAnswer = $rightAnswerGame($question); // получаем правильный ответ задачи
        if ($userAnswer === $rightAnswer) { // проверяем ответ
            line("Correct!"); // если правильный
            $checkAnswer = true;
        } else { // если не правильный
            $message = "'{$userAnswer}' is wrong answer ;(. Correct answer was '{$rightAnswer}'\n"
            . "Let's try again, {$name}!";
            line($message);
            $checkAnswer = false;
        }
    }
    //если ответы были все три раза правильные, кидаем респект юзеру
    if ($checkAnswer === true) {
        line("Congratulations, %s!", $name);
    }
}
