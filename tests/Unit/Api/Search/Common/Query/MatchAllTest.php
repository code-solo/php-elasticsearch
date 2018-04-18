<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\MatchAll;

class MatchAllTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'match_all' => [
                'boost' => 1.2
            ]
        ];

        $clause = new MatchAll();
        $clause->setBoost(1.2);

        $this->assertArraySame($dsl, $clause->toDsl());
    }
}