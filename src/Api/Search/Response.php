<?php

namespace MySpot\Elasticsearch\Driver\Api\Search;

use MySpot\Elasticsearch\Driver\Exception\InvalidRawData;
use MySpot\Elasticsearch\Driver\Search\Response\Aggregations;
use MySpot\Elasticsearch\Driver\Search\Response\Hits;
use MySpot\Elasticsearch\Driver\Search\Response\Shards;

/**
 * Class Response
 * @package MySpot\Elasticsearch\Driver\Api\Search
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/_the_search_api.html
 */
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
     * @var Aggregations
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
     * Time in milliseconds for Elasticsearch to execute the search.
     *
     * @return int
     */
    public function took(): int
    {
        return $this->took;
    }

    /**
     * Tells us if the search timed out or not.
     *
     * @return bool
     */
    public function timedOut(): bool
    {
        return $this->timedOut;
    }

    /**
     * Tells us how many shards were searched, as well as a count of the
     * successful/failed searched shards.
     *
     * @return Shards
     */
    public function shards(): Shards
    {
        return $this->shards;
    }

    /**
     * Search results.
     *
     * @return Hits
     */
    public function hits(): Hits
    {
        return $this->hits;
    }

    /**
     * Aggregations results.
     *
     * @return Aggregations
     */
    public function aggregations(): ?Aggregations
    {
        return $this->aggregations;
    }
}