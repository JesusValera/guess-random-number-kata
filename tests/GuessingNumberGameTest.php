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
        $randomNumber = new StubRandomNumberGenerator();
        $game = new GuessingNumberGame($randomNumber);

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
        $randomNumber = new StubRandomNumberGenerator();
        $game = new GuessingNumberGame($randomNumber);

        $firstAttempt = $game->guessNumber(10);
        self::assertEquals(GuessingNumberGame::STATUS_NUMBER_IS_LOWER, $firstAttempt);
        $secondAttempt = $game->guessNumber(5);
        self::assertEquals(GuessingNumberGame::STATUS_PLAYER_WIN, $secondAttempt);
    }

    /*
     * As player
     * I play a 3
     * I play a 5
     * the player wins
     */

    /** @test */
    public function assert_player_initial_attempt_is_lower(): void
    {
        $randomNumber = new StubRandomNumberGenerator();
        $game = new GuessingNumberGame($randomNumber);

        $firstAttempt = $game->guessNumber(3);
        self::assertEquals(GuessingNumberGame::STATUS_NUMBER_IS_HIGHER, $firstAttempt);
        $secondAttempt = $game->guessNumber(5);
        self::assertEquals(GuessingNumberGame::STATUS_PLAYER_WIN, $secondAttempt);
    }

    /*
     * As player
     * I play a 10
     * I play a 3
     * I play a 5
     * The player loses
     */

    /** @test */
    public function assert_player_loses_after_three_attempts(): void
    {
        $randomNumber = new StubRandomNumberGenerator();
        $game = new GuessingNumberGame($randomNumber);

        $firstAttempt = $game->guessNumber(3);
        self::assertEquals(GuessingNumberGame::STATUS_NUMBER_IS_HIGHER, $firstAttempt);
        $secondAttempt = $game->guessNumber(10);
        self::assertEquals(GuessingNumberGame::STATUS_NUMBER_IS_LOWER, $secondAttempt);
        $thirdAttempt = $game->guessNumber(4);
        self::assertEquals(GuessingNumberGame::STATUS_PLAYER_LOSES, $thirdAttempt);
    }
}
