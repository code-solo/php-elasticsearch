<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

use CodeSolo\Elasticsearch\Api\QueryType;

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
}