<?php

namespace CodeSolo\ElasticsearchTest\Unit\Api\Search;

use CodeSolo\Elasticsearch\Api\Search\Count;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\ElasticsearchTests\Unit\Api\Connection;

class CountTest extends AbstractTest
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
        $count = new Count(new Connection());
        $count
            ->setIndex('twitter')
            ->setType('_doc');
        $this->assertArraySame($dsl, $count->toDsl());
    }
}