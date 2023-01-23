<?php

namespace ValueObjects\Tests\Units;

use ValueObjects\StringValueObject;
use ValueObjects\Tests\Utils\TestCase;

class StringValueObjectTest extends TestCase
{
    /** @test */
    public function it_should_return_the_value(): void
    {
        $expected = 'Some string';
        $valueObject = new StringValueObject($expected);

        $this->assertEquals($expected, $valueObject->value());
    }

    /** @test */
    public function it_should_not_be_empty(): void
    {
        $valueObjectNotEmpty = new StringValueObject('Not empty');
        $valueObjectEmpty = new StringValueObject('');

        $this->assertFalse($valueObjectNotEmpty->isEmpty());
        $this->assertTrue($valueObjectEmpty->isEmpty());
    }

    /** @test */
    public function it_should_return_they(): void
    {
        $valueObjectNotEmpty = new StringValueObject('Not empty');
        $valueObjectEmpty = new StringValueObject('');

        $this->assertFalse($valueObjectNotEmpty->isEmpty());
        $this->assertTrue($valueObjectEmpty->isEmpty());
    }

    /** @test */
    public function it_should_be_equals(): void
    {
        $valueObject1 = new StringValueObject('Some value');
        $valueObject2 = new StringValueObject('Some value');

        $this->assertTrue($valueObject1->equals($valueObject2));
    }

    /** @test */
    public function it_should_be_stringable(): void
    {
        $valueObject = new StringValueObject('Some value');

        $this->assertIsString($valueObject->__toString());
    }
}
