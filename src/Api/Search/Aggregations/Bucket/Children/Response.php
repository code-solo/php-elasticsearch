<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Bucket\Children;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var int
     */
    private $docCount;

    /**
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('doc_count', $data)) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->docCount = $data['doc_count'];
        return $instance;
    }

    /**
     * @return int
     */
    public function getDocCount(): int
    {
        return $this->docCount;
    }
}