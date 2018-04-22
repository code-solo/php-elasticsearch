<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\MatchNone;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class MatchNoneTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'match_none' => []
        ];
        $clause = new MatchNone();
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}