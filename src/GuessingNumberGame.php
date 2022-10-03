<?php

declare(strict_types=1);

namespace GuessRandomNumber;

final class GuessingNumberGame
{
    public const STATUS_PLAYER_WIN = 'You win';

    public const STATUS_NUMBER_IS_LOWER = 'The number is lower';

    public const STATUS_NUMBER_IS_HIGHER = 'The number is higher';

    public const STATUS_PLAYER_LOSES = 'You lost. The number was ';

    private int $currentAttempt = 0;

    private int $guessingNumber;

    public function __construct(RandomNumberGeneratorInterface $randomNumberGenerator)
    {
        $this->guessingNumber = $randomNumberGenerator->generate();
    }

    public function guessNumber(int $number): string
    {
        if ($this->isNumberGuessed($number)) {
            return self::STATUS_PLAYER_WIN;
        }

        if ($this->isGameOver()) {
            return self::STATUS_PLAYER_LOSES . $this->guessingNumber;
        }

        return $this->numberIsNotGuessedResponse($number);
    }

    private function isGameOver(): bool
    {
        $this->increaseCurrentAttempt();

        return $this->currentAttempt >= 3;
    }

    private function increaseCurrentAttempt(): void
    {
        $this->currentAttempt++;
    }

    private function isNumberGuessed(int $number): bool
    {
        return $number === $this->guessingNumber;
    }

    private function numberIsNotGuessedResponse(int $number): string
    {
        return ($this->guessingNumber > $number)
            ? self::STATUS_NUMBER_IS_HIGHER
            : self::STATUS_NUMBER_IS_LOWER;
    }
}
