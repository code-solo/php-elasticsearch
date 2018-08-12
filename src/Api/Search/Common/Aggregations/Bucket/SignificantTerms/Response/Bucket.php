<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\SignificantTerms\Response;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Bucket extends AbstractResponse
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var int
     */
    private $docCount;

    /**
     * @var int
     */
    private $bgCount;

    /**
     * @var float
     */
    private $score;

    /**
     * @inheritdoc
     */
    public static function fromRawData(array $data)
    {
        if (!array_key_exists('key', $data) ||
            !array_key_exists('doc_count', $data) ||
            !array_key_exists('bg_count', $data) ||
            !array_key_exists('score', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->key = $data['key'];
        $instance->docCount = $data['doc_count'];
        $instance->bgCount = $data['bg_count'];
        $instance->score = $data['score'];
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'key' => $this->key,
            'doc_count' => $this->docCount,
            'bg_count' => $this->bgCount,
            'score' => $this->score,
        ];
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return int
     */
    public function getDocCount(): int
    {
        return $this->docCount;
    }

    /**
     * @return int
     */
    public function getBgCount(): int
    {
        return $this->bgCount;
    }

    /**
     * @return float
     */
    public function getScore(): float
    {
        return $this->score;
    }
}