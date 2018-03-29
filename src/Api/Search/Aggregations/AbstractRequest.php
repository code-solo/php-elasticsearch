<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations;

use CodeSolo\Elasticsearch\Api\AbstractRequest as Base;

abstract class AbstractRequest extends Base
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
            $this->getType() => array_merge(parent::toDsl(), $this->getBody()),
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