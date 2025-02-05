<?php

namespace Spatie\ElasticsearchQueryBuilder\Queries;

class DistanceFeatureQuery implements Query
{
    public static function create(
        string $field,
        string $pivot,
        \DateTime|string|array $origin,
        ?float $boost = null
    ): static {
        return new static($field, $pivot, $origin);
    }

    public function __construct(
        protected string $field,
        protected string $pivot,
        protected \DateTime|string|array $origin,
        protected ?float $boost = null,
    )
    {
    }

    public function toArray(): array
    {
        $params = [
            'field' => $this->field,
            'pivot' => $this->pivot,
            'origin' => $this->origin,
        ];
        if ($this->boost) {
            $params['boost'] = $this->boost;
        }

        return [
            'distance_feature' => $params
        ];
    }
}
