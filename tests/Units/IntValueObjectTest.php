<?php

namespace ValueObjects\Tests\Units;

use ValueObjects\IntValueObject;
use ValueObjects\Tests\Utils\TestCase;

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
    public function it_should_be_small(): void
    {
        $valueObject1 = new IntValueObject(1);
        $valueObject2 = new IntValueObject(2);

        $this->assertTrue($valueObject1->isSmallerThan($valueObject2));
    }

    /** @test */
    public function it_should_be_small_or_equal_and_it_is_smaller(): void
    {
        $valueObject1 = new IntValueObject(1);
        $valueObject2 = new IntValueObject(2);

        $this->assertTrue($valueObject1->isSmallerOrEqualThan($valueObject2));
    }

    /** @test */
    public function it_should_be_small_or_equal_and_it_is_equal(): void
    {
        $valueObject1 = new IntValueObject(1);
        $valueObject2 = new IntValueObject(1);

        $this->assertTrue($valueObject1->isSmallerOrEqualThan($valueObject2));
    }

    /** @test */
    public function it_should_be_equals(): void
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

        $this->assertTrue($valueObject1->isBiggerThan($valueObject2));
    }

    /** @test */
    public function it_should_be_bigger_or_equal_and_it_is_bigger(): void
    {
        $valueObject1 = new IntValueObject(2);
        $valueObject2 = new IntValueObject(1);

        $this->assertTrue($valueObject1->isBiggerOrEqualThan($valueObject2));
    }

    /** @test */
    public function it_should_be_bigger_or_equal_and_it_is_equal(): void
    {
        $valueObject1 = new IntValueObject(1);
        $valueObject2 = new IntValueObject(1);

        $this->assertTrue($valueObject1->isBiggerOrEqualThan($valueObject2));
    }

    /** @test */
    public function it_should_be_stringable(): void
    {
        $expected = '1';
        $valueObject = new IntValueObject(1);

        $this->assertEquals($expected, $valueObject->__toString());
    }
}
