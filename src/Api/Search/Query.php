<?php

namespace MySpot\Elasticsearch\Driver\Api\Search;

use MySpot\Elasticsearch\Driver\Api\Search\Query\Body;

class Query
{
    /**
     * @var string
     */
    private $index;

    /**
     * @var string;
     */
    private $type;

    /**
     * @var Body
     */
    private $body;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if ($this->index) {
            $dsl['index'] = $this->index;
        }
        if ($this->type) {
            $dsl['type'] = $this->type;
        }
        if ($this->body) {
            $dsl['body'] = $this->body->toDsl();
        }
        return $dsl;
    }
}