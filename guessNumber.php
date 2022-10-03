<?php

declare(strict_types=1);

use GuessRandomNumber\GuessingNumberGame;
use GuessRandomNumber\RandomNumberGenerator;

require __DIR__ . '/vendor/autoload.php';

if ('cli' !== PHP_SAPI) {
    exit();
}

$randomNumberGenerator = new RandomNumberGenerator();
$guessingNumberGame = new GuessingNumberGame($randomNumberGenerator);

do {
    $input = validateInput();

    $response = $guessingNumberGame->guessNumber($input);

    echo $response . PHP_EOL;
    if ($response === GuessingNumberGame::STATUS_PLAYER_WIN) {
        break;
    }

} while (!str_starts_with($response, GuessingNumberGame::STATUS_PLAYER_LOSES));

function validateInput(): int
{
    do {
        $input = readline("> Insert number (1-10): ");
        $filterInput = filter_var($input, FILTER_VALIDATE_INT, [
            'options' => [
                'min_range' => 1,
                'max_range' => 10,
            ],
        ]);
    } while (!is_int($filterInput));

    return (int) $input;
}