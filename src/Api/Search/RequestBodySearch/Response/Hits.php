<?php

namespace CodeSolo\Elasticsearch\Api\Search\RequestBodySearch\Response;

use CodeSolo\Elasticsearch\Api\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Hits extends AbstractResponse
{
    /**
     * @var int
     */
    private $total;

    /**
     * @var array
     */
    private $hits = [];

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data): Hits
    {
        if (!array_key_exists('total', $data) ||
            !array_key_exists('hits', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->total = $data['total'];
        $instance->hits = $data['hits'];
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'total' => $this->getTotal(),
            'hits' => $this->getHits(),
        ];
    }

    /**
     * Total number of documents matching our search criteria.
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * Actual array of search results (defaults to first 10 documents)
     *
     * @return array
     */
    public function getHits(): array
    {
        return $this->hits;
    }
}