<?php

namespace ValueObjects\Tests\Units;

use ValueObjects\Uuid;
use PHPUnit\Framework\TestCase;

class UuidTest extends TestCase
{
    /** @test */
    public function it_should_create_a_new_uuid(): void
    {
        $uuid = new Uuid('be8fdfd7-c2c5-4d13-ba18-12594e793684');

        $this->assertInstanceOf(Uuid::class, $uuid);
    }

    public function it_should_create_a_new_random(): void
    {
        $uuidString = Uuid::random()->value();

        $this->assertIsString($uuidString);
        $this->assertNotEmpty($uuidString);
    }

    public function it_should_be_equals(): void
    {
        $uuid1 = Uuid::random();
        $uuidString = $uuid1->value();
        $uuid2 = new Uuid($uuidString);

        $this->assertTrue($uuid1->equals($uuid2));
    }
}
