<?php

declare(strict_types=1);

namespace ValueObjects;

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

    public function isSmallerThan(IntValueObject $other): bool
    {
        return $this->value() < $other->value();
    }

    public function isSmallerOrEqualThan(IntValueObject $other): bool
    {
        return $this->equals($other) || $this->isSmallerThan($other);
    }

    public function equals(IntValueObject $other): bool
    {
        return $this->value() === $other->value();
    }

    public function isBiggerThan(IntValueObject $other): bool
    {
        return $this->value() > $other->value();
    }

    public function isBiggerOrEqualThan(IntValueObject $other): bool
    {
        return $this->equals($other) || $this->isBiggerThan($other);
    }

    public function __toString()
    {
        return (string) $this->value();
    }
}
