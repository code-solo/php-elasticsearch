<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations;

use CodeSolo\Elasticsearch\Api\Search\Request\Aggregations;

abstract class AbstractRequest
{
    /**
     * @var Aggregations|null
     */
    protected $aggregations;

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
        $dsl = [
            $this->getType() => $this->getBody(),
        ];
        if ($this->aggregations) {
            $dsl['aggregations'] = $this->aggregations->toDsl();
        }
        return $dsl;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param AbstractRequest $item
     * @return static
     */
    public function addAggregationsItem(AbstractRequest $item): AbstractRequest
    {
        $this->aggregations = $this->aggregations ?? new Aggregations();
        $this->aggregations->addItem($item);
        return $this;
    }
}