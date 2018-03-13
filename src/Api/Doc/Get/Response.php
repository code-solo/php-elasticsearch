<?php

namespace MySpot\Elasticsearch\Driver\Api\Doc\Get;

use MySpot\Elasticsearch\Driver\Exception\InvalidRawData;

class Response
{
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
     * @var int|null
     */
    private $version;

    /**
     * @var bool
     */
    private $found;

    /**
     * @var array|null
     */
    private $source;

    /**
     * @param array $data
     * @return static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('_index', $data) ||
            !array_key_exists('_type', $data) ||
            !array_key_exists('_id', $data) ||
            !array_key_exists('found', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->index = $data['_index'];
        $instance->type = $data['_type'];
        $instance->id = $data['_id'];
        $instance->version = $data['_version'] ?? null;
        $instance->found = $data['found'];
        $instance->source = $data['_source'] ?? null;
        return $instance;
    }

    /**
     * Response constructor.
     */
    private function __construct()
    {
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
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @return bool
     */
    public function getFound(): bool
    {
        return $this->found;
    }

    /**
     * @return array
     */
    public function getSource(): ?array
    {
        return $this->source;
    }
}