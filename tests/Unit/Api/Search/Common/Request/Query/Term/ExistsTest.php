<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Term;

use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
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