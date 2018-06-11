<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\DiversifiedSampler;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DiversifiedSampler\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'my_unbiased_sample' => [
                'diversified_sampler' => [
                    'shard_size' => 200,
                    'field' => 'author',
                    'max_docs_per_value' => 3,
                    'script' => [],
                    'execution_hint' => 'map',
                ],
            ]
        ];
        $item = new Request('my_unbiased_sample');
        $item
            ->setField('author')
            ->setShardSize(200)
            ->setMaxDocsPerValue(3)
            ->setScript(new Script())
            ->setExecutionHint('map');

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}