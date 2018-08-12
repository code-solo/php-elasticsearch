<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DiversifiedSampler;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Api\Search\Common\Response\Aggregations\HasAggregationsTrait;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    use HasAggregationsTrait;

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
        $instance->setAggregations($data);
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        $data = $this->getAggregations()->toRawData();
        $data['doc_count'] = $this->docCount;
        return $data;
    }

    /**
     * @return int
     */
    public function getDocCount(): int
    {
        return $this->docCount;
    }
}