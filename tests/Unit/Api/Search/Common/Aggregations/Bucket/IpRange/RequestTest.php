<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\IpRange;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\IpRange\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    public function test1()
    {
        $dsl = [
            'ip_ranges' => [
                'ip_range' => [
                    'field' => 'ip',
                    'ranges' => [
                        [
                            'key' => 'ip',
                            'from' => '10.0.0.5',
                            'to' => '10.0.0.5',
                            'mask' => '10.0.0.127/25',
                        ],
                        [
                            'key' => 'ip',
                            'from' => '10.0.0.5',
                            'to' => '10.0.0.5',
                            'mask' => '10.0.0.127/25',
                        ],
                    ],
                    'keyed' => true,
                ],
            ]
        ];
        $item = new Request('ip_ranges');
        $item
            ->setField('ip')
            ->setRanges([
                (new Request\Range())
                    ->setKey('ip')
                    ->setFrom('10.0.0.5')
                    ->setTo('10.0.0.5')
                    ->setMask('10.0.0.127/25'),
                (new Request\Range())
                    ->setKey('ip')
                    ->setFrom('10.0.0.5')
                    ->setTo('10.0.0.5')
                    ->setMask('10.0.0.127/25')
            ])
            ->setKeyed(true);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}