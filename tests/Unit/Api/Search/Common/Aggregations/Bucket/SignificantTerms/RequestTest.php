<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Common\Aggregations\Bucket\SignificantTerms;

use CodeSolo\Elasticsearch\Api\Script;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\SignificantTerms\Request;
use CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Term\Term;
use CodeSolo\ElasticsearchTests\Unit\AbstractTest;

class RequestTest extends AbstractTest
{
    /**
     * Test.
     */
    public function test1()
    {
        $dsl = [
            'significant_crime_types' => [
                'significant_terms' => [
                    'field' => 'crime_type',
                    'size' => 10,
                    'shard_size' => 10,
                    'min_doc_count' => 10,
                    'shard_min_doc_count' => 10,
                    'include' => '.*sport.*',
                    'exclude' => 'water_.*',
                    'execution_hint' => 'map',
                    'percentage' => (object) [],
                    'background_filter' => [
                        'term' => [
                            'text' => 'spain',
                        ],
                    ],
                    'script_heuristic' => [
                        'script' => [],
                    ],
                    'mutual_information' => [
                        'include_negatives' => true,
                        'background_is_superset' => false,
                    ],
                    'chi_square' => [
                        'include_negatives' => true,
                        'background_is_superset' => false,
                    ],
                    'gnd' => [
                        'background_is_superset' => false,
                    ],
                ],
            ]
        ];
        $item = new Request('significant_crime_types');
        $item
            ->setField('crime_type')
            ->setSize(10)
            ->setShardSize(10)
            ->setMinDocCount(10)
            ->setShardMinDocCount(10)
            ->setInclude('.*sport.*')
            ->setExclude('water_.*')
            ->setExecutionHint('map')
            ->setPercentage(
                (new Request\Percentage())
            )
            ->setBackgroundFilter(
                (new Request\BackgroundFilter())
                    ->addClause(
                        (new Term('text'))
                            ->setValue('spain')
                    )
            )
            ->setScriptHeuristic(
                (new Request\ScriptHeuristic())
                    ->setScript(new Script())
            )
            ->setChiSquare(
                (new Request\ChiSquare())
                    ->setIncludeNegatives(true)
                    ->setBackgroundIsSuperset(false)
            )
            ->setGnd(
                (new Request\Gnd())
                    ->setBackgroundIsSuperset(false)
            )
            ->setMutualInformation(
                (new Request\MutualInformation())
                    ->setIncludeNegatives(true)
                    ->setBackgroundIsSuperset(false)
            );

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }

    /**
     * Test.
     */
    public function test2()
    {
        $dsl = [
            'significant_crime_types' => [
                'significant_terms' => [
                    'include' => [
                        'sport'
                    ],
                    'exclude' => [
                        'water_'
                    ],
                ],
            ]
        ];
        $item = new Request('significant_crime_types');
        $item
            ->setInclude([
                'sport'
            ])
            ->setExclude([
                'water_'
            ]);

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }

    /**
     * Test.
     */
    public function test3()
    {
        $dsl = [
            'significant_crime_types' => [
                'significant_terms' => [
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
        $item = new Request('significant_crime_types');
        $item
            ->setInclude(
                (new Request\Filter())
                    ->setPartition(0)
                    ->setNumPartitions(20)
            )
            ->setExclude((new Request\Filter())
                ->setPartition(0)
                ->setNumPartitions(20)
            );

        $this->assertArraySame($dsl, [
            $item->getName() => $item->toDsl()
        ]);
    }
}