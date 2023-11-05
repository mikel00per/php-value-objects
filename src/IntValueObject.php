<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObjects;

use Stringable;

class IntValueObject implements Stringable
{
    public function __construct(protected int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }

    public function isSmaller(IntValueObject $other): bool
    {
        return $this->value() < $other->value();
    }

    public function isSmallerOrEqual(IntValueObject $other): bool
    {
        return $this->equals($other) || $this->isSmaller($other);
    }

    public function equals(IntValueObject $other): bool
    {
        return $this->value() === $other->value();
    }

    public function isBigger(IntValueObject $other): bool
    {
        return $this->value() > $other->value();
    }

    public function isBiggerOrEqual(IntValueObject $other): bool
    {
        return $this->equals($other) || $this->isBigger($other);
    }

    public function __toString()
    {
        return (string) $this->value();
    }
}
