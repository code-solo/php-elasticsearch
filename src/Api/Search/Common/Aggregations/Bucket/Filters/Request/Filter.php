<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Filters\Request;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query;

class Filter extends Query
{
    /**
     * @var string
     */
    private $name;

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return static
     */
    public function setName(string $name): Filter
    {
        $this->name = $name;
        return $this;
    }
}