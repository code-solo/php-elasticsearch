<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations;

abstract class AbstractRequest
{
    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    abstract public function getType(): string;

    /**
     * @return array
     */
    abstract protected function getBody(): array;

    /**
     * AbstractItem constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function toDsl(): array
    {
        return [
            $this->getType() => $this->getBody(),
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}