<?php

declare(strict_types=1);

namespace ValueObjects;

use InvalidArgumentException;
use Location\Coordinate as CoordinateGeo;
use Location\Formatter\Coordinate\DecimalDegrees;
use Location\Formatter\Coordinate\DecimalMinutes;
use Location\Formatter\Coordinate\DMS;
use Location\Formatter\Coordinate\GeoJSON;
use Stringable;

final class Coordinate implements Stringable
{
    public function __construct(private float $latitude, private float $longitude)
    {
        $this->ensureIsValidCoordinate();
    }

    public function latitudeValue(): float
    {
        return $this->latitude;
    }

    public function longitudeValue(): float
    {
        return $this->longitude;
    }

    public function equals(Coordinate $other): bool
    {
        return $this->latitudeValue() === $other->latitudeValue()
            && $this->longitudeValue() === $other->longitudeValue();
    }

    private function ensureIsValidCoordinate(): void
    {
        try {
            new CoordinateGeo($this->latitude, $this->longitude);
        } catch (InvalidArgumentException $e) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the values: <%s> <%s>.', __CLASS__, $this->longitude, $this->longitude)
            );
        }
    }

    public function toDecimalDegrees(string $separator = ' ', int $digits = 5): string
    {
        return (new CoordinateGeo($this->latitude, $this->longitude))
            ->format(new DecimalDegrees($separator, $digits));
    }

    public function toDecimalMinutes(string $separator = ' '): string
    {
        return (new CoordinateGeo($this->latitude, $this->longitude))
            ->format(new DecimalMinutes($separator));
    }

    public function toDMS(string $separator = ' ', bool $useCardinalLetters = true): string
    {
        return (new CoordinateGeo($this->latitude, $this->longitude))
            ->format(new DMS($separator, $useCardinalLetters, DMS::UNITS_UTF8));
    }

    /**
     * @note Float values processed by json_encode() are affected by the ini-setting serialize_precision.
     * You can change the number of decimal places in the JSON output with <ini_set('serialize_precision', 8).
     */
    public function toGeoJson(): string
    {
        return (new CoordinateGeo($this->latitude, $this->longitude))
            ->format(new GeoJSON());
    }

    public function __toString()
    {
        $this->toGeoJson();
        return $this->toDecimalDegrees();
    }
}
