<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Matrix\MatrixStats;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var int
     */
    private $docCount;

    /**
     * @var Response\Field[]
     */
    private $fields = [];

    /**
     * @param array $data
     * @return Response|static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('doc_count', $data) ||
            !array_key_exists('fields', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->docCount = $data['doc_count'];
        foreach ($data['fields'] as $field) {
            $instance->fields[] = Response\Field::fromRawData($field);
        }
        return $instance;
    }

    /**
     * @return int
     */
    public function getDocCount(): int
    {
        return $this->docCount;
    }

    /**
     * @return Response\Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}