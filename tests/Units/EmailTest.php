<?php

namespace Shared\Domain\ValueObjects\Tests\Units;

use Faker\Factory;
use Faker\Generator;
use InvalidArgumentException;
use Shared\Domain\ValueObjects\Tests\Utils\TestCase;
use Shared\Domain\ValueObjects\Email;

final class EmailTest extends TestCase
{
    private Generator $faker;

    protected function setUp(): void
    {
        $this->faker = Factory::create();

        parent::setUp();
    }

    /** @test */
    public function it_should_create_a_new_email(): void
    {
        $email = new Email($this->faker->email());

        $this->assertInstanceOf(Email::class, $email);
    }

    /** @test */
    public function it_should_be_equals(): void
    {
        $email1 = new Email($this->faker->email());
        $emailString = $email1->value();
        $email2 = new Email($emailString);

        $this->assertTrue($email1->equals($email2));
    }

    /** @test */
    public function it_should_converted_to_string(): void
    {
        $string = $this->faker->email();

        $email = new Email($string);

        $this->assertIsString($email->__toString());
        $this->assertEquals($string, $email->__toString());
    }

    /** @test */
    public function it_should_throw_exception_is_not_valid_email(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Email('bad_email');
    }
}
