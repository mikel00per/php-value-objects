<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObjects;

use Stringable;

readonly class IntValueObject implements Stringable
{
    public function __construct(protected int $value) {}

    final public function value(): int
    {
        return $this->value;
    }

    final public function isSmaller(self $other): bool
    {
        return $this->value() < $other->value();
    }

    final public function isSmallerOrEqual(self $other): bool
    {
        return $this->equals($other) || $this->isSmaller($other);
    }

    final public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    final public function isBigger(self $other): bool
    {
        return $this->value() > $other->value();
    }

    final public function isBiggerOrEqual(self $other): bool
    {
        return $this->equals($other) || $this->isBigger($other);
    }

    public function __toString(): string
    {
        return (string) $this->value();
    }
}
