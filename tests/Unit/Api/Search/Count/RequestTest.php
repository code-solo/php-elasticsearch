<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Count;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query;
use CodeSolo\Elasticsearch\Api\Search\Count\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'query' => [],
        ];
        $request = new Request();
        $request->setQuery(new Query());
        $this->assertArraySame($dsl, $request->toDsl());
    }
}