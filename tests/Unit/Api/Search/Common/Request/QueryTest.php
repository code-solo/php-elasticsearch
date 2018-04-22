<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class QueryTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'match_all' => [],
        ];
        $query = new Query();
        $query
            ->addClause(new Query\MatchAll());
        $this->assertArraySame($dsl, $query->toDsl());
    }
}