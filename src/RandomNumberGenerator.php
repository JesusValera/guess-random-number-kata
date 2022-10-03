<?php

declare(strict_types=1);

namespace GuessRandomNumber;

final class RandomNumberGenerator implements RandomNumberGeneratorInterface
{
    public function generate(): int
    {
        return random_int(1, 10);
    }
}
