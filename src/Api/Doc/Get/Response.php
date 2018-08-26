<?php

namespace CodeSolo\Elasticsearch\Api\Doc\Get;

use CodeSolo\Elasticsearch\Api\AbstractResponse;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
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
     * @var string|null
     */
    private $routing;

    /**
     * @var bool
     */
    private $found;

    /**
     * @var array|null
     */
    private $source;

    /**
     * @var array|null
     */
    private $fields;

    /**
     * @inheritdoc
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
        $instance->routing = $data['_routing'] ?? null;
        $instance->found = $data['found'];
        $instance->source = $data['_source'] ?? null;
        $instance->fields = $data['fields'] ?? null;
        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function toRawData(): array
    {
        $data =  [
            '_index' => $this->index,
            '_type' => $this->type,
            '_id' => $this->id,
            'found' => $this->found,
        ];
        if (!is_null($this->version)) {
            $data['_version'] = $this->version;
        }
        if (!is_null($this->routing)) {
            $data['_routing'] = $this->routing;
        }
        if (!is_null($this->source)) {
            $data['_source'] = $this->source;
        }
        if (!is_null($this->fields)) {
            $data['fields'] = $this->fields;
        }
        return $data;
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
     * @return int|null
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @return string|null
     */
    public function getRouting(): ?string
    {
        return $this->routing;
    }

    /**
     * @return bool
     */
    public function getFound(): bool
    {
        return $this->found;
    }

    /**
     * @return array|null
     */
    public function getSource(): ?array
    {
        return $this->source;
    }

    /**
     * @return array|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }
}