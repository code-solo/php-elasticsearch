<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\Term;

use CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Query\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Exists;

class ExistsTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'exists' => [
                'field' => 'user',
            ],
        ];
        $clause = new Exists('user');
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}