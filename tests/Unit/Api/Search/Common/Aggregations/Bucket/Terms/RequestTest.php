<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\Terms;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Terms\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'genres' => [
                'terms' => [
                    'field' => 'genre',
                    'size' => 5,
                    'shard_size' => 10,
                    'show_term_doc_count_error' => true,
                    'min_doc_count' => 10,
                    'shard_min_doc_count' => 10,
                    'script' => [],
                    'include' => '.*sport.*',
                    'exclude' => 'water_.*',
                    'collect_mode' => 'breadth_first',
                    'execution_hint' => 'map',
                    'missing' => 'N/A',
                ],
            ]
        ];
        $item = new Request('genres');
        $item
            ->setField('genre')
            ->setSize(5)
            ->setShardSize(10)
            ->setShowTermDocCountError(true)
            ->setMinDocCount(10)
            ->setShardMinDocCount(10)
            ->setScript((new Script()))
            ->setInclude('.*sport.*')
            ->setExclude('water_.*')
            ->setCollectMode('breadth_first')
            ->setExecutionHint('map')
            ->setMissing('N/A');

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }

    public function test2()
    {
        $dsl = [
            'genres' => [
                'terms' => [
                    'include' => [
                        'mazda',
                        'honda'
                    ],
                    'exclude' => [
                        'rover',
                        'jensen'
                    ],
                ],
            ]
        ];
        $item = new Request('genres');
        $item
            ->setInclude([
                'mazda',
                'honda'
            ])
            ->setExclude([
                'rover',
                'jensen'
            ]);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }

    public function test3()
    {
        $dsl = [
            'genres' => [
                'terms' => [
                    'include' => [
                        'partition' => 0,
                        'num_partitions' => 20,
                    ],
                    'exclude' => [
                        'partition' => 0,
                        'num_partitions' => 20,
                    ],
                ],
            ]
        ];
        $item = new Request('genres');
        $item
            ->setInclude(
                (new Request\Filter())
                    ->setPartition(0)
                    ->setNumPartitions(20)
            )
            ->setExclude(
                (new Request\Filter())
                    ->setPartition(0)
                    ->setNumPartitions(20)
            );

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}