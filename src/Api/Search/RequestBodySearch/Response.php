<?php

namespace CodeSolo\Elasticsearch\Api\Search\RequestBodySearch;

use CodeSolo\Elasticsearch\Exception\InvalidRawData;
use CodeSolo\Elasticsearch\Api\Search\Common\Response\Aggregations\HasAggregationsTrait;
use CodeSolo\Elasticsearch\Api\Search\Common\Response\Shards;

class Response
{
    use HasAggregationsTrait;

    /**
     * @var int
     */
    private $took;

    /**
     * @var bool
     */
    private $timedOut;

    /**
     * @var Shards
     */
    private $shards;

    /**
     * @var Response\Hits
     */
    private $hits;

    /**
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('took', $data) ||
            !array_key_exists('timed_out', $data) ||
            !array_key_exists('_shards', $data) ||
            !array_key_exists('hits', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->took = $data['took'];
        $instance->timedOut = $data['timed_out'];
        $instance->shards = Shards::fromRawData($data['_shards']);
        $instance->hits = Response\Hits::fromRawData($data['hits']);

        if (array_key_exists('aggregations', $data)) {
            $instance->setAggregations($data['aggregations']);
        }
        return $instance;
    }

    /**
     * Response constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return int
     */
    public function getTook(): int
    {
        return $this->took;
    }

    /**
     * @return bool
     */
    public function getTimedOut(): bool
    {
        return $this->timedOut;
    }

    /**
     * @return Shards
     */
    public function getShards(): Shards
    {
        return $this->shards;
    }

    /**
     * @return Response\Hits
     */
    public function getHits(): Response\Hits
    {
        return $this->hits;
    }
}