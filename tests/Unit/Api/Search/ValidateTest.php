<?php

namespace CodeSolo\ElasticsearchTest\Unit\Api\Search;

use CodeSolo\Elasticsearch\Api\Search\Validate;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\ElasticsearchTests\Unit\Api\Connection;

class ValidateTest extends AbstractTest
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
        $validate = new Validate(new Connection());
        $validate
            ->setIndex('twitter')
            ->setType('_doc');
        $this->assertArraySame($dsl, $validate->toDsl());
    }
}