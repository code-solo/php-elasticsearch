<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Joining;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;

class ParentId extends AbstractClause
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $id;

    /**
     * @var bool
     */
    private $ignoreUnmapped;

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::PARENT_ID;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->type)) {
            $dsl['type'] = $this->type;
        }
        if (!is_null($this->id)) {
            $dsl['id'] = $this->id;
        }
        if (!is_null($this->ignoreUnmapped)) {
            $dsl['ignore_unmapped'] = $this->ignoreUnmapped;
        }
        return $dsl;
    }

    /**
     * @param string $type
     * @return ParentId|static
     */
    public function setType(string $type): ParentId
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $id
     * @return ParentId|static
     */
    public function setId(string $id): ParentId
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param bool $ignoreUnmapped
     * @return ParentId|static
     */
    public function setIgnoreUnmapped(bool $ignoreUnmapped): ParentId
    {
        $this->ignoreUnmapped = $ignoreUnmapped;
        return $this;
    }
}