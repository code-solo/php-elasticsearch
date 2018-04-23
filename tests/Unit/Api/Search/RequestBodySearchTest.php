<?php

namespace CodeSolo\ElasticsearchTest\Unit\Api\Search;

use CodeSolo\Elasticsearch\Api\Search\RequestBodySearch;
use CodeSolo\ElasticsearchTests\Unit\Api\Connection;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestBodySearchTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'index' => 'twitter',
            'type' => '_doc',
            'body' => [],
        ];
        $requestBodySearch = new RequestBodySearch(new Connection());
        $requestBodySearch
            ->setIndex('twitter')
            ->setType('_doc');
        $this->assertArraySame($dsl, $requestBodySearch->toDsl());
    }
}