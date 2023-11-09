<?php

namespace Shared\Domain\ValueObjects\Tests\Units;

use Faker\Factory;
use Faker\Generator;
use InvalidArgumentException;
use Shared\Domain\ValueObjects\Coordinate;
use Shared\Domain\ValueObjects\Tests\Utils\TestCase;

final class CoordinateTest extends TestCase
{
    private Generator $faker;

    protected function setUp(): void
    {
        $this->faker = Factory::create();

        parent::setUp();
    }

    /** @test */
    public function it_should_create_a_new_coordinate(): void
    {
        $fakeCoordinates = $this->faker->localCoordinates();
        $coordinate = new Coordinate($fakeCoordinates['latitude'], $fakeCoordinates['longitude']);

        $this->assertInstanceOf(Coordinate::class, $coordinate);
    }

    /** @test */
    public function it_should_fail_create_a_new_coordinate(): void
    {
        $this->expectException(InvalidArgumentException::class);

        new Coordinate(-190.00, -190.00);
    }

    /** @test */
    public function it_should_be_equal(): void
    {
        $fakeCoordinates = $this->faker->localCoordinates();

        $coordinate1 = new Coordinate($fakeCoordinates['latitude'], $fakeCoordinates['longitude']);
        $coordinate2 = new Coordinate($fakeCoordinates['latitude'], $fakeCoordinates['longitude']);

        $this->assertTrue($coordinate1->equals($coordinate2));
    }

    /** @test */
    public function it_should_be_converted_to_decimal_degrees(): void
    {
        $coordinate = new Coordinate('37.1881700', '-3.6066700');

        $this->assertEquals('37.18817 -3.60667', $coordinate->toDecimalDegrees());
    }

    /** @test */
    public function it_should_be_converted_to_decimal_minutes(): void
    {
        $coordinate = new Coordinate('37.1881700', '-3.6066700');

        $this->assertEquals('37° 11.290′ -003° 36.400′', $coordinate->toDecimalMinutes());
    }

    /** @test */
    public function it_should_be_converted_to_dms(): void
    {
        $coordinate = new Coordinate('37.1881700', '-3.6066700');

        $this->assertEquals('37° 11′ 17″ N 003° 36′ 24″ W', $coordinate->toDMS());
    }

    /** @test */
    public function it_should_be_converted_to_geo_json(): void
    {
        $coordinate = new Coordinate('37.1881700', '-3.6066700');

        $this->assertEquals('{"type":"Point","coordinates":[-3.60667,37.18817]}', $coordinate->toGeoJson());
    }

    /** @test */
    public function it_should_be_stringable(): void
    {
        $fakeCoordinates = $this->faker->localCoordinates();
        $coordinate = new Coordinate($fakeCoordinates['latitude'], $fakeCoordinates['longitude']);

        $this->assertIsString($coordinate->__toString());
    }
}
