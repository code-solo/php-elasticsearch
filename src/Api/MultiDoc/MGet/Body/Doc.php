<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc\MGet\Body;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class Doc extends AbstractRequest
{
    /**
     * @var string|null
     */
    private $index;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string
     */
    private $id;

    /**
     * @inheritdoc
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if (!is_null($this->index)) {
            $dsl['_index'] = $this->index;
        }
        if (!is_null($this->type)) {
            $dsl['_type'] = $this->type;
        }
        $dsl['_id'] = $this->id;
        return $dsl;
    }

    /**
     * @param string $index
     * @return static
     */
    public function setIndex(string $index): Doc
    {
        $this->index = $index;
        return $this;
    }

    /**
     * @param string $type
     * @return static
     */
    public function setType(string $type): Doc
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $id
     * @return static
     */
    public function setId(string $id): Doc
    {
        $this->id = $id;
        return $this;
    }
}