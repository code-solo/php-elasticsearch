<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\GeoBounds\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bounds extends AbstractResponse
{
    /**
     * @var Bounds\Location
     */
    private $topLeft;

    /**
     * @var Bounds\Location
     */
    private $bottomRight;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data): Bounds
    {
        if (!array_key_exists('top_left', $data) ||
            !array_key_exists('bottom_right', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->topLeft = Bounds\Location::fromRawData($data['top_left']);
        $instance->bottomRight = Bounds\Location::fromRawData($data['bottom_right']);
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'top_left' => $this->topLeft->toRawData(),
            'bottom_right' => $this->bottomRight->toRawData(),
        ];
    }

    /**
     * @return Bounds\Location
     */
    public function getTopLeft(): Bounds\Location
    {
        return $this->topLeft;
    }

    /**
     * @return Bounds\Location
     */
    public function getBottomRight(): Bounds\Location
    {
        return $this->bottomRight;
    }
}