<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Request\Query\Term;

use CodeSolo\ElasticsearchTests\Unit\AbstractTest;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Terms;

class TermsTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'terms' => [
                'user' => [
                    'kimchy',
                    'elasticsearch',
                ],
            ],
        ];
        $clause = new Terms('user');
        $clause
            ->setValue([
                'kimchy',
                'elasticsearch',
            ]);
        $this->assertArraySame($dsl, $clause->toDsl());
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'terms' => [
                'user' => [
                    'index' => 'users',
                    'type' => '_doc',
                    'id' => '2',
                    'path' => 'followers',
                    'routing' => '',
                ],
            ],
        ];
        $clause = new Terms('user');
        $clause
            ->setValue([
                'kimchy',
                'elasticsearch',
            ])
            ->setIndex('users')
            ->setType('_doc')
            ->setId(2)
            ->setPath('followers')
            ->setRouting('');
        $this->assertArraySame($dsl, $clause->toDsl());
    }
}