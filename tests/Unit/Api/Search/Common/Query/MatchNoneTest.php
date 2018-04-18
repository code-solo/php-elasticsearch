<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\MatchNone;

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