<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObjects;

use Stringable;

readonly class StringValueObject implements Stringable
{
    public function __construct(protected string $value) {}

    final public function value(): string
    {
        return $this->value;
    }

    final public function isEmpty(): bool
    {
        return empty($this->value());
    }

    final public function equals(self $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }
}
