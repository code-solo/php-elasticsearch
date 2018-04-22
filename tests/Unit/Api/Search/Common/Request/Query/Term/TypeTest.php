<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Term;

use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Type;

class TypeTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'type' => [
                'value' => '_doc',
            ],
        ];
        $clause = new Type('_doc');
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}