<?php

namespace MySpot\Elasticsearch\Driver\Api\Doc\Index;

use MySpot\Elasticsearch\Driver\Api\Doc\Index\Response\Shards;
use MySpot\Elasticsearch\Driver\Exception\InvalidRawData;

class Response
{
    /**
     * @var Shards
     */
    private $shards;

    /**
     * @var string
     */
    private $index;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $version;

    /**
     * @var int
     */
    private $seqNo;

    /**
     * @var int
     */
    private $primaryTerm;

    /**
     * @var string
     */
    private $result;

    /**
     * @param array $data
     * @return static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('_shards', $data) ||
            !array_key_exists('_index', $data) ||
            !array_key_exists('_type', $data) ||
            !array_key_exists('_id', $data) ||
            !array_key_exists('_version', $data) ||
            !array_key_exists('_seq_no', $data) ||
            !array_key_exists('_primary_term', $data) ||
            !array_key_exists('result', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->shards = Shards::fromRawData($data['_shards']);
        $instance->index = $data['_index'];
        $instance->type = $data['_type'];
        $instance->id = $data['_id'];
        $instance->version = $data['_version'];
        $instance->seqNo = $data['_seq_no'];
        $instance->primaryTerm = $data['_primary_term'];
        $instance->result = $data['result'];
        return $instance;
    }

    /**
     * Response constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return Shards
     */
    public function getShards(): Shards
    {
        return $this->shards;
    }

    /**
     * @return string
     */
    public function getIndex(): string
    {
        return $this->index;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @return int
     */
    public function getSeqNo(): int
    {
        return $this->seqNo;
    }

    /**
     * @return int
     */
    public function getPrimaryTerm(): int
    {
        return $this->primaryTerm;
    }

    /**
     * @return string
     */
    public function getResult(): string
    {
        return $this->result;
    }
}