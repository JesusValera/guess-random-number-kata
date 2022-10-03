<?php

declare(strict_types=1);

namespace GuessRandomNumberTests;

use GuessRandomNumber\GuessingNumberGame;
use PHPUnit\Framework\TestCase;

final class GuessingNumberGameTest extends TestCase
{
    /** @test */
    public function give_me_a_good_name_please(): void
    {
        $game = new GuessingNumberGame();

        $result = $game->guessNumber();

        self::assertEquals(true, $result);
    }
}
