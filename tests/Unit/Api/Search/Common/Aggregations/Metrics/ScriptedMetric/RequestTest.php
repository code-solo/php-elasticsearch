<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Metrics\ScriptedMetric;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\ScriptedMetric\Request;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * @return void
     */
    public function test1()
    {
        $dsl = [
            'profit' => [
                'scripted_metric' => [
                    'init_script' => '',
                    'map_script' => '',
                    'combine_script' => '',
                    'reduce_script' => '',
                    'params' => [],
                ],
            ]
        ];
        $item = new Request('profit');
        $item
            ->setInitScript('')
            ->setMapScript('')
            ->setCombineScript('')
            ->setReduceScript('')
            ->setParams([]);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }

    /**
     * @return void
     */
    public function test2()
    {
        $dsl = [
            'profit' => [
                'scripted_metric' => [
                    'init_script' => [],
                    'map_script' => [],
                    'combine_script' => [],
                    'reduce_script' => [],
                    'params' => [],
                ],
            ]
        ];
        $item = new Request('profit');
        $item
            ->setInitScript(new Request\InitScript())
            ->setMapScript(new Request\MapScript())
            ->setCombineScript(new Request\CombineScript())
            ->setReduceScript(new Request\ReduceScript())
            ->setParams([]);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}