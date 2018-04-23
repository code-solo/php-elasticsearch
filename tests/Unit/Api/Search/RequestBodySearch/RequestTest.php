<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\RequestBodySearch;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Aggregations;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query;
use CodeSolo\Elasticsearch\Api\Search\RequestBodySearch\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'from' => 0,
            'size' => 10,
            'query' => [],
            'aggregations' => [],
        ];
        $request = new Request();
        $request
            ->setFrom(0)
            ->setSize(10)
            ->setQuery(new Query())
            ->setAggregations(new Aggregations());
        $this->assertArraySame($dsl, $request->toDsl());
    }
}