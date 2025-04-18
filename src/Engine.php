<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function launchEngineGame(
    callable $problemGame,
    callable $generateQuestion,
    callable $rightAnswerGame,
    callable $arrayToString
): void {
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
        $questionData = $generateQuestion(); // получаем вопрос в виде массива
        $questionText = $arrayToString($questionData); // переводим вопрос в текст
        line("Question: {$questionText}"); // выводим вопрос пользователю

        $userAnswer = prompt('Your answer'); // получаем ответ от пользователя
        $rightAnswer = $rightAnswerGame($questionData); // получаем правильный ответ задачи
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
