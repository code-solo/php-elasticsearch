<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Bucket\Terms\Response;

use CodeSolo\Elasticsearch\Api\Search\Aggregations\ResponseCollectionTrait;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bucket
{
    use ResponseCollectionTrait {
        fromRawData as fromRawDataTrait;
    }

    /**
     * @var int
     */
    private $key;

    /**
     * @var int
     */
    private $docCount;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data): Bucket
    {
        $instance = static::fromRawDataTrait($data);
        if (!array_key_exists('key', $data) ||
            !array_key_exists('doc_count', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance->key = $data['key'];
        $instance->docCount = $data['doc_count'];
        return $instance;
    }
}