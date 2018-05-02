<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Response;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations as Aggs;

class Aggregations
{
    const MAP = [
        AggregationsType::METRICS_AVG => Aggs\Metrics\Avg\Response::class,
        AggregationsType::METRICS_CARDINALITY => Aggs\Metrics\Cardinality\Response::class,
        AggregationsType::METRICS_EXTENDED_STATS => Aggs\Metrics\ExtendedStats\Response::class,
        AggregationsType::METRICS_GEO_BOUNDS => Aggs\Metrics\GeoBounds\Response::class,
        AggregationsType::METRICS_GEO_CENTROID => Aggs\Metrics\GeoCentroid\Response::class,
        AggregationsType::METRICS_MAX => Aggs\Metrics\Max\Response::class,
        AggregationsType::METRICS_MIN => Aggs\Metrics\Min\Response::class,
        AggregationsType::METRICS_PERCENTILES => Aggs\Metrics\Percentiles\Response::class,
        AggregationsType::METRICS_PERCENTILE_RANKS => Aggs\Metrics\PercentileRanks\Response::class,
        AggregationsType::METRICS_SCRIPTED_METRIC => '',
        AggregationsType::METRICS_STATS => Aggs\Metrics\Stats\Response::class,
        AggregationsType::METRICS_SUM => Aggs\Metrics\Sum\Response::class,
        AggregationsType::METRICS_TOP_HITS => '',
        AggregationsType::METRICS_VALUE_COUNT => Aggs\Metrics\ValueCount\Response::class,

        AggregationsType::BUCKET_ADJACENCY_MATRIX => 'adjacency_matrix',
        AggregationsType::BUCKET_CHILDREN => 'children',
        AggregationsType::BUCKET_COMPOSITE => 'composite',
        AggregationsType::BUCKET_DATE_HISTOGRAM => 'date_histogram',
        AggregationsType::BUCKET_DATE_RANGE => 'date_range',
        AggregationsType::BUCKET_DIVERSIFIED_SAMPLER => 'diversified_sampler',
        AggregationsType::BUCKET_FILTER => 'filter',
        AggregationsType::BUCKET_FILTERS => 'filters',
        AggregationsType::BUCKET_GEO_DISTANCE => 'geo_distance',
        AggregationsType::BUCKET_GEOHASH_GRID => 'geohash_grid',
        AggregationsType::BUCKET_GLOBAL => 'global',
        AggregationsType::BUCKET_HISTOGRAM => 'histogram',
        AggregationsType::BUCKET_IP_RANGE => 'ip_range',
        AggregationsType::BUCKET_MISSING => 'missing',
        AggregationsType::BUCKET_NESTED => 'nested',
        AggregationsType::BUCKET_RANGE => 'range',
        AggregationsType::BUCKET_REVERSE_NESTED => 'reverse_nested',
        AggregationsType::BUCKET_SAMPLER => 'sampler',
        AggregationsType::BUCKET_SIGNIFICANT_TERMS => 'significant_terms',
        AggregationsType::BUCKET_SIGNIFICANT_TEXT => 'significant_text',
        AggregationsType::BUCKET_TERMS => 'terms',

        AggregationsType::PIPELINE_AVG_BUCKET => 'avg_bucket',
        AggregationsType::PIPELINE_DERIVATIVE => 'derivative',
        AggregationsType::PIPELINE_MAX_BUCKET => 'max_bucket',
        AggregationsType::PIPELINE_MIN_BUCKET => 'min_bucket',
        AggregationsType::PIPELINE_SUM_BUCKET => 'sum_bucket',
        AggregationsType::PIPELINE_STATS_BUCKET => 'stats_bucket',
        AggregationsType::PIPELINE_EXTENDED_STATS_BUCKET => 'extended_stats_bucket',
        AggregationsType::PIPELINE_PERCENTILES_BUCKET => 'percentiles_bucket',
        AggregationsType::PIPELINE_MOVING_AVG => 'moving_avg',
        AggregationsType::PIPELINE_CUMULATIVE_SUM => 'cumulative_sum',
        AggregationsType::PIPELINE_BUCKET_SCRIPT => 'bucket_script',
        AggregationsType::PIPELINE_BUCKET_SELECTOR => 'bucket_selector',
        AggregationsType::PIPELINE_BUCKET_SORT => 'bucket_sort',
        AggregationsType::PIPELINE_SERIAL_DIFF => 'serial_diff',

        AggregationsType::MATRIX_STATS => 'matrix_stats',
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

            switch ($type) {
                case AggregationsType::BUCKET_TERMS:
                    $item = Aggs\Bucket\Terms\Response::fromRawData($data);
                    break;

                case AggregationsType::METRICS_AVG:
                    $item = Aggs\Metrics\Avg\Response::fromRawData($data);
                    break;

                default:
                    // TODO change it
                    throw new \Exception();
            }
            $this->decodedItems[$name] = $item;
        }
        return $this->decodedItems[$name];
    }
}