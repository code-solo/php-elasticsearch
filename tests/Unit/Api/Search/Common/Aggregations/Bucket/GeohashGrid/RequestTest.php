<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\GeohashGrid;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\GeohashGrid\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'large-grid' => [
                'geohash_grid' => [
                    'field' => 'location',
                    'precision' => 3,
                    'size' => 10000,
                    'shard_size' => 10000,
                ],
            ]
        ];
        $item = new Request('large-grid');
        $item
            ->setField('location')
            ->setPrecision(3)
            ->setSize(10000)
            ->setShardSize(10000);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}