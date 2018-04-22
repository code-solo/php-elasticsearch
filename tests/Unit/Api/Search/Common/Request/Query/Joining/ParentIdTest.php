<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Joining;

use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Joining\ParentId;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class ParentIdTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'parent_id' => [
                'type' => 'my_child',
                'id' => '1',
                'ignore_unmapped' => true,
            ],
        ];
        $clause = new ParentId();
        $clause
            ->setType('my_child')
            ->setId('1')
            ->setIgnoreUnmapped(true);
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}