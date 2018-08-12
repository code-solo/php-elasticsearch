<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Filters\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bucket extends AbstractResponse
{
    /**
     * @var int
     */
    private $docCount;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data)
    {
        if (!array_key_exists('doc_count', $data)) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->docCount = $data['doc_count'];
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'doc_count' => $this->docCount,
        ];
    }

    /**
     * @return int
     */
    public function getDocCount(): int
    {
        return $this->docCount;
    }
}