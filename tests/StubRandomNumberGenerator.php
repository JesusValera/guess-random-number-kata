<?php

declare(strict_types=1);

namespace GuessRandomNumberTests;

use GuessRandomNumber\RandomNumberGeneratorInterface;

final class StubRandomNumberGenerator implements RandomNumberGeneratorInterface
{
    public function generate(): int
    {
        return 5;
    }
}
