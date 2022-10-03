<?php

declare(strict_types=1);

namespace GuessRandomNumber;

interface RandomNumberGeneratorInterface
{
    public function generate(): int;
}
