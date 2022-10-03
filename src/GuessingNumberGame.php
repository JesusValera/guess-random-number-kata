<?php

declare(strict_types=1);

namespace GuessRandomNumber;

final class GuessingNumberGame
{
    private const GUESSING_NUMBER = 5;

    public const STATUS_PLAYER_WIN = 'You win';

    public const STATUS_NUMBER_IS_LOWER = 'The number is lower';

    public const STATUS_NUMBER_IS_HIGHER = 'The number is higher';

    public const STATUS_PLAYER_LOSES = 'You lost';

    public function guessNumber(int $number): string
    {
        if ($number === self::GUESSING_NUMBER) {
            return self::STATUS_PLAYER_WIN;
        }

        return self::GUESSING_NUMBER > $number
            ? self::STATUS_NUMBER_IS_HIGHER
            : self::STATUS_NUMBER_IS_LOWER;
    }
}
