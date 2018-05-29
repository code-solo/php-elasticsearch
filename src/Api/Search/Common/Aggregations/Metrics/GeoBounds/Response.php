<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\GeoBounds;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var Response\Bounds
     */
    private $bounds;

    /**
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('bounds', $data)) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->bounds = Response\Bounds::fromRawData($data['bounds']);
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'bounds' => $this->bounds->toRawData(),
        ];
    }

    /**
     * @return Response\Bounds
     */
    public function getBounds(): Response\Bounds
    {
        return $this->bounds;
    }
}