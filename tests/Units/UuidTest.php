<?php

namespace Shared\Domain\ValueObjects\Tests\Units;

use InvalidArgumentException;
use Shared\Domain\ValueObjects\Tests\Utils\TestCase;
use Shared\Domain\ValueObjects\Uuid;

class UuidTest extends TestCase
{
    /** @test */
    public function it_should_create_a_new_uuid(): void
    {
        $uuid = new Uuid('be8fdfd7-c2c5-4d13-ba18-12594e793684');

        $this->assertInstanceOf(Uuid::class, $uuid);
    }

    /** @test */
    public function it_should_fail_create_a_new_uuid(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Uuid('not-valid');
    }

    /** @test */
    public function it_should_create_a_new_random(): void
    {
        $uuidString = Uuid::random()->value();

        $this->assertIsString($uuidString);
        $this->assertNotEmpty($uuidString);
    }

    /** @test */
    public function it_should_be_equal(): void
    {
        $uuid1 = Uuid::random();
        $uuidString = $uuid1->value();
        $uuid2 = new Uuid($uuidString);

        $this->assertTrue($uuid1->equals($uuid2));
    }

    /** @test */
    public function it_should_be_stringable(): void
    {
        $uuid1 = Uuid::random();
        $uuidString = $uuid1->__toString();

        $this->assertIsString($uuidString);
    }
}
