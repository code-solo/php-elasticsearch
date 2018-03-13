<?php

namespace MySpot\Elasticsearch\Driver\Api\MultiDoc\Bulk\Response;

use MySpot\Elasticsearch\Driver\Exception\InvalidRawData;

class Item
{
    /**
     * @var string
     */
    private $action;

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
     * @var string
     */
    private $result;

    /**
     * @var Shards
     */
    private $shards;

    /**
     * @var Error
     */
    private $error;

    /**
     * @var int
     */
    private $seqNo;

    /**
     * @var int
     */
    private $primaryTerm;

    /**
     * @var int
     */
    private $status;

    /**
     * @param array $data
     * @return static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Item
    {
        if (!array_key_exists('_index', $data) ||
            !array_key_exists('_type', $data) ||
            !array_key_exists('_id', $data) ||
            !array_key_exists('status', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->index = $data['_index'];
        $instance->type = $data['_type'];
        $instance->id = $data['_id'];
        $instance->status = $data['status'];
        if (array_key_exists('_shards', $data)) {
            $instance->shards = Shards::fromRawData($data['_shards']);
        }
        if (array_key_exists('error', $data)) {
            $instance->error = Error::fromRawData($data['error']);
        }
        $instance->version = $data['_version'] ?? null;
        $instance->result = $data['result'] ?? null;
        $instance->seqNo = $data['_seq_no'] ?? null;
        $instance->primaryTerm = $data['_primary_term'] ?? null;
        return $instance;
    }

    /**
     * @param string $action
     * @return Item
     */
    public function setAction(string $action): Item
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
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
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return Shards|null
     */
    public function getShards(): ?Shards
    {
        return $this->shards;
    }

    /**
     * @return Error|null
     */
    public function getError(): ?Error
    {
        return $this->error;
    }

    /**
     * @return int|null
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @return int|null
     */
    public function getResult(): ?int
    {
        return $this->result;
    }

    /**
     * @return int|null
     */
    public function getSeqNo(): ?int
    {
        return $this->seqNo;
    }

    /**
     * @return int|null
     */
    public function getPrimaryTerm(): ?int
    {
        return $this->primaryTerm;
    }
}