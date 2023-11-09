<?php

declare(strict_types=1);

namespace Shared\Domain\ValueObjects;

use Stringable;

readonly class StringValueObject implements Stringable
{
    public function __construct(protected string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }

    public function isEmpty(): bool
    {
        return empty($this->value());
    }

    public function equals(StringValueObject $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }
}
