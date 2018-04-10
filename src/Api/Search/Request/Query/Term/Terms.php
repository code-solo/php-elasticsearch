<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Term;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class Terms extends AbstractClause
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var string[]
     */
    private $value;

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
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $routing;

    /**
     * Terms constructor.
     * @param string $field
     */
    public function __construct(string $field)
    {
        $this->field = $field;
    }

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::TERMS;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->index)) {
            $dsl['index'] = $this->index;
        }
        if (!is_null($this->type)) {
            $dsl['type'] = $this->type;
        }
        if (!is_null($this->id)) {
            $dsl['id'] = $this->id;
        }
        if (!is_null($this->path)) {
            $dsl['path'] = $this->path;
        }
        if (!is_null($this->routing)) {
            $dsl['routing'] = $this->routing;
        }
        return [
            $this->field => $dsl ? $dsl : $this->value
        ];
    }

    /**
     * @param string[] $value
     * @return Terms|static
     */
    public function setValue(array $value): Terms
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param string $index
     * @return Terms|static
     */
    public function setIndex(string $index): Terms
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return Terms|static
     */
    public function setType(string $type): Terms
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $id
     * @return Terms|static
     */
    public function setId(string $id): Terms
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $path
     * @return Terms|static
     */
    public function setPath(string $path): Terms
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @param string $routing
     * @return Terms|static
     */
    public function setRouting(string $routing): Terms
    {
        $this->routing = $routing;
        return $this;
    }
}