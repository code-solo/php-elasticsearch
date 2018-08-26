<?php

namespace CodeSolo\Elasticsearch\Api\Doc\Update;

use CodeSolo\Elasticsearch\Api\AbstractResponse;
use CodeSolo\Elasticsearch\Api\Doc\Update\Response\Shards;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
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
        $instance->result = $data['result'];
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            '_shards' => $this->shards->toRawData(),
            '_index' => $this->index,
            '_type' => $this->type,
            '_id' => $this->id,
            '_version' => $this->version,
            'result' => $this->result,
        ];
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
     * @return string
     */
    public function getResult(): string
    {
        return $this->result;
    }
}