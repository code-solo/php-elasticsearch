<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Term;

use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Ids;

class IdsTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'ids' => [
                'values' => [
                    '1',
                    '4',
                    '100',
                ],
                'type' => '_doc',
            ],
        ];
        $clause = new Ids([
            '1',
            '4',
            '100',
        ]);
        $clause->setType('_doc');
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}