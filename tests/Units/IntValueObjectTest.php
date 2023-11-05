<?php

namespace Shared\Domain\ValueObjects\Tests\Units;

use Shared\Domain\ValueObjects\IntValueObject;
use Shared\Domain\ValueObjects\Tests\Utils\TestCase;

class IntValueObjectTest extends TestCase
{
    /** @test */
    public function it_should_return_the_value(): void
    {
        $expected = 1;
        $valueObject = new IntValueObject($expected);

        $this->assertEquals($expected, $valueObject->value());
    }

    /** @test */
    public function it_should_be_smaller(): void
    {
        $valueObject1 = new IntValueObject(1);
        $valueObject2 = new IntValueObject(2);

        $this->assertTrue($valueObject1->isSmaller($valueObject2));
    }

    /** @test */
    public function it_should_be_smaller_or_equal_and_it_is_smaller(): void
    {
        $valueObject1 = new IntValueObject(1);
        $valueObject2 = new IntValueObject(2);

        $this->assertTrue($valueObject1->isSmallerOrEqual($valueObject2));
    }

    /** @test */
    public function it_should_be_smaller_or_equal_and_it_is_equal(): void
    {
        $valueObject1 = new IntValueObject(1);
        $valueObject2 = new IntValueObject(1);

        $this->assertTrue($valueObject1->isSmallerOrEqual($valueObject2));
    }

    /** @test */
    public function it_should_be_equal(): void
    {
        $valueObject1 = new IntValueObject(1);
        $valueObject2 = new IntValueObject(1);

        $this->assertTrue($valueObject1->equals($valueObject2));
    }

    /** @test */
    public function it_should_be_bigger(): void
    {
        $valueObject1 = new IntValueObject(2);
        $valueObject2 = new IntValueObject(1);

        $this->assertTrue($valueObject1->isBigger($valueObject2));
    }

    /** @test */
    public function it_should_be_bigger_or_equal_and_it_is_bigger(): void
    {
        $valueObject1 = new IntValueObject(2);
        $valueObject2 = new IntValueObject(1);

        $this->assertTrue($valueObject1->isBiggerOrEqual($valueObject2));
    }

    /** @test */
    public function it_should_be_bigger_or_equal_and_it_is_equal(): void
    {
        $valueObject1 = new IntValueObject(1);
        $valueObject2 = new IntValueObject(1);

        $this->assertTrue($valueObject1->isBiggerOrEqual($valueObject2));
    }

    /** @test */
    public function it_should_be_stringable(): void
    {
        $expected = '1';
        $valueObject = new IntValueObject(1);

        $this->assertEquals($expected, $valueObject->__toString());
    }
}
