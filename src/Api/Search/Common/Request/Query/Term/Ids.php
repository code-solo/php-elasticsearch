<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\AbstractClause;

class Ids extends AbstractClause
{
    /**
     * @var array
     */
    private $values;

    /**
     * @var string
     */
    private $type;

    /**
     * Ids constructor.
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::IDS;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [
            'values' => $this->values
        ];
        if (!is_null($this->type)) {
            $dsl['type'] = $this->type;
        }
        return $dsl;
    }

    /**
     * @param string $type
     * @return Ids|static
     */
    public function setType(string $type): Ids
    {
        $this->type = $type;
        return $this;
    }
}