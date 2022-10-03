<?php

declare(strict_types=1);

namespace GuessRandomNumberTests;

use GuessRandomNumber\GuessingNumberGame;
use PHPUnit\Framework\TestCase;

final class GuessingNumberGameTest extends TestCase
{
    /*
     * As player
     * I play the number 5
     * the player wins
     */

    /** @test */
    public function assert_player_wins_first_attempt(): void
    {
        $game = new GuessingNumberGame();

        $result = $game->guessNumber(5);

        self::assertEquals(GuessingNumberGame::STATUS_PLAYER_WIN, $result);
    }

    /*
     * As player
     * I play a 10
     * I play a 5
     * the player wins
     */

    /** @test */
    public function assert_player_initial_attempt_is_higher(): void
    {
        $game = new GuessingNumberGame();

        $firstAttempt = $game->guessNumber(10);
        self::assertEquals(GuessingNumberGame::STATUS_LOWER, $firstAttempt);
        $secondAttempt = $game->guessNumber(5);
        self::assertEquals(GuessingNumberGame::STATUS_PLAYER_WIN, $secondAttempt);
    }

}
