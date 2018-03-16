<?php

namespace CodeSolo\Elasticsearch\Api\Search;

use CodeSolo\Elasticsearch\Exception\InvalidRawData;
use CodeSolo\Elasticsearch\Api\Search\Response\Aggregations;
use CodeSolo\Elasticsearch\Api\Search\Response\Hits;
use CodeSolo\Elasticsearch\Api\Search\Response\Shards;

class Response
{
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
     * @var Hits
     */
    private $hits;

    /**
     * @var Aggregations|null
     */
    private $aggregations;

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
        $instance->hits = Hits::fromRawData($data['hits']);

        if (array_key_exists('aggregations', $data)) {
            $instance->aggregations = Aggregations::fromRawData($data['aggregations']);
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
     * @return Hits
     */
    public function getHits(): Hits
    {
        return $this->hits;
    }

    /**
     * @return Aggregations|null
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }
}