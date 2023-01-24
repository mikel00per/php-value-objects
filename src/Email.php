<?php

declare(strict_types=1);

namespace ValueObjects;

use Stringable;

class Email implements Stringable
{
    public function __construct(protected string $value)
    {
        $this->ensureIsValidEmail($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Email $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }

    private function ensureIsValidEmail(string $email): void
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \InvalidArgumentException(
                sprintf('<%s> does not allow the value <%s>.', static::class, $email)
            );
        }
    }
}
