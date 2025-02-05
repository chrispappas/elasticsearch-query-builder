<?php

namespace Spatie\ElasticsearchQueryBuilder\Queries;

class GeoDistanceQuery implements Query
{
    public function __construct(
        protected string $field,
        protected string $distance,
        protected string|array $location,
    ) {}

    /**
     * Note: the location format of [float, float] is in longitude, latitude order. A string is the opposite ("lat,lon")
     *
     * @param  string  $field
     * @param  string  $distance  a valid distance unit (100km, 10mi)
     * @param  string|array  $location  a valid geopoint ([lon,lat] floats, ['lat' => float, 'lon' => float] or a string "lat,lon")
     * @return static
     */
    public static function create(string $field, string $distance, string|array $location): static
    {
        return new static($field, $distance, $location);
    }

    public function toArray(): array
    {
        $params = [
            'distance' => $this->distance,
            $this->field => $this->location
        ];

        return [
            'geo_distance' => $params
        ];
    }
}
