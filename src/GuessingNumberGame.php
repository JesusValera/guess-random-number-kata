<?php

declare(strict_types=1);

namespace GuessRandomNumber;

final class GuessingNumberGame
{
    public const STATUS_PLAYER_WIN = 'You win';

    public const STATUS_LOWER = 'The number is lower';

    public const STATUS_HIGHER = 'The number is higher';

    public const STATUS_PLAYER_LOSES = 'You lost';

    public function guessNumber(int $number): string
    {
        if ($number === 5) {
            return self::STATUS_PLAYER_WIN;
        }

        return self::STATUS_LOWER;
    }
}
