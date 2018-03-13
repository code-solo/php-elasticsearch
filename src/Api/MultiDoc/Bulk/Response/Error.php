<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc\Bulk\Response;

use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Error
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $reason;

    /**
     * @var string
     */
    private $indexUuid;

    /**
     * @var string
     */
    private $shard;

    /**
     * @var string
     */
    private $index;

    /**
     * @param array $data
     * @return static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Error
    {
        if (!array_key_exists('type', $data) ||
            !array_key_exists('reason', $data) ||
            !array_key_exists('index_uuid', $data) ||
            !array_key_exists('shard', $data) ||
            !array_key_exists('index', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->type = $data['type'];
        $instance->reason = $data['reason'];
        $instance->indexUuid = $data['index_uuid'];
        $instance->shard = $data['shard'];
        $instance->index = $data['index'];
        return $instance;
    }
}