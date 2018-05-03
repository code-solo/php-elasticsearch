<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Response;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations as Aggs;

class Aggregations
{
    /**
     * @var string[]
     */
    private $map = [
        AggregationsType::METRICS_AVG              => Aggs\Metrics\Avg\Response::class,
        AggregationsType::METRICS_CARDINALITY      => Aggs\Metrics\Cardinality\Response::class,
        AggregationsType::METRICS_EXTENDED_STATS   => Aggs\Metrics\ExtendedStats\Response::class,
        AggregationsType::METRICS_GEO_BOUNDS       => Aggs\Metrics\GeoBounds\Response::class,
        AggregationsType::METRICS_GEO_CENTROID     => Aggs\Metrics\GeoCentroid\Response::class,
        AggregationsType::METRICS_MAX              => Aggs\Metrics\Max\Response::class,
        AggregationsType::METRICS_MIN              => Aggs\Metrics\Min\Response::class,
        AggregationsType::METRICS_PERCENTILES      => Aggs\Metrics\Percentiles\Response::class,
        AggregationsType::METRICS_PERCENTILE_RANKS => Aggs\Metrics\PercentileRanks\Response::class,
        AggregationsType::METRICS_SCRIPTED_METRIC  => '',
        AggregationsType::METRICS_STATS            => Aggs\Metrics\Stats\Response::class,
        AggregationsType::METRICS_SUM              => Aggs\Metrics\Sum\Response::class,
        AggregationsType::METRICS_TOP_HITS         => '',
        AggregationsType::METRICS_VALUE_COUNT      => Aggs\Metrics\ValueCount\Response::class,

        AggregationsType::BUCKET_ADJACENCY_MATRIX    => Aggs\Bucket\AdjacencyMatrix\Response::class,
        AggregationsType::BUCKET_CHILDREN            => Aggs\Bucket\Children\Response::class,
        AggregationsType::BUCKET_COMPOSITE           => '',
        AggregationsType::BUCKET_DATE_HISTOGRAM      => '',
        AggregationsType::BUCKET_DATE_RANGE          => '',
        AggregationsType::BUCKET_DIVERSIFIED_SAMPLER => '',
        AggregationsType::BUCKET_FILTER              => '',
        AggregationsType::BUCKET_FILTERS             => '',
        AggregationsType::BUCKET_GEO_DISTANCE        => '',
        AggregationsType::BUCKET_GEOHASH_GRID        => '',
        AggregationsType::BUCKET_GLOBAL              => '',
        AggregationsType::BUCKET_HISTOGRAM           => '',
        AggregationsType::BUCKET_IP_RANGE            => '',
        AggregationsType::BUCKET_MISSING             => '',
        AggregationsType::BUCKET_NESTED              => '',
        AggregationsType::BUCKET_RANGE               => '',
        AggregationsType::BUCKET_REVERSE_NESTED      => '',
        AggregationsType::BUCKET_SAMPLER             => '',
        AggregationsType::BUCKET_SIGNIFICANT_TERMS   => '',
        AggregationsType::BUCKET_SIGNIFICANT_TEXT    => '',
        AggregationsType::BUCKET_TERMS               => Aggs\Bucket\Terms\Response::class,

        AggregationsType::PIPELINE_AVG_BUCKET            => '',
        AggregationsType::PIPELINE_DERIVATIVE            => '',
        AggregationsType::PIPELINE_MAX_BUCKET            => '',
        AggregationsType::PIPELINE_MIN_BUCKET            => '',
        AggregationsType::PIPELINE_SUM_BUCKET            => '',
        AggregationsType::PIPELINE_STATS_BUCKET          => '',
        AggregationsType::PIPELINE_EXTENDED_STATS_BUCKET => '',
        AggregationsType::PIPELINE_PERCENTILES_BUCKET    => '',
        AggregationsType::PIPELINE_MOVING_AVG            => '',
        AggregationsType::PIPELINE_CUMULATIVE_SUM        => '',
        AggregationsType::PIPELINE_BUCKET_SCRIPT         => '',
        AggregationsType::PIPELINE_BUCKET_SELECTOR       => '',
        AggregationsType::PIPELINE_BUCKET_SORT           => '',
        AggregationsType::PIPELINE_SERIAL_DIFF           => '',

        AggregationsType::MATRIX_STATS => Aggs\Matrix\MatrixStats\Response::class,
    ];

    /**
     * @var Aggs\AbstractResponse[]
     */
    private $decodedItems = [];

    /**
     * @var array
     */
    private $rawData = [];

    /**
     * @param array $data
     * @return static
     */
    public static function fromRawData(array $data)
    {
        $instance = new static();
        $instance->rawData = $data;
        return $instance;
    }

    /**
     * @param Aggs\AbstractRequest $request
     * @return Aggs\AbstractResponse
     * @throws \Exception
     */
    public function getItem(Aggs\AbstractRequest $request): Aggs\AbstractResponse
    {
        $name = $request->getName();
        $type = $request->getType();

        if (!array_key_exists($name, $this->rawData)) {
            // TODO change it
            throw new \Exception();
        }
        if (!array_key_exists($name, $this->decodedItems)) {
            $data = $this->rawData[$name];

            if (!array_key_exists($type, $this->map)) {
                // TODO change it
                throw new \Exception();
            }
            /** @var Aggs\AbstractResponse $responseClass */
            $responseClass = $this->map[$type];
            $this->decodedItems[$name] = $responseClass::fromRawData($data);
        }
        return $this->decodedItems[$name];
    }
}