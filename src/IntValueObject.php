<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObjects;

use Stringable;

final readonly class IntValueObject implements Stringable
{
    public function __construct(protected int $value) {}

    public function value(): int
    {
        return $this->value;
    }

    public function isSmaller(self $other): bool
    {
        return $this->value() < $other->value();
    }

    public function isSmallerOrEqual(self $other): bool
    {
        return $this->equals($other) || $this->isSmaller($other);
    }

    public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    public function isBigger(self $other): bool
    {
        return $this->value() > $other->value();
    }

    public function isBiggerOrEqual(self $other): bool
    {
        return $this->equals($other) || $this->isBigger($other);
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }
}
