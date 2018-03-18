<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations;

class Type
{
    const METRICS_AVG = 'avg';
    const METRICS_CARDINALITY = 'cardinality';
    const METRICS_EXTENDED_STATS = 'extended_stats';
    const METRICS_GEO_BOUNDS = 'geo_bounds';
    const METRICS_GEO_CENTROID = 'geo_centroid';
    const METRICS_MAX = 'max';
    const METRICS_MIN = 'min';
    const METRICS_PERCENTILES = 'percentiles';
    const METRICS_PERCENTILE_RANKS = 'percentile_ranks';
    const METRICS_SCRIPTED_METRIC = 'scripted_metric';
    const METRICS_STATS = 'stats';
    const METRICS_SUM = 'sum';
    const METRICS_TOP_HITS = 'top_hits';
    const METRICS_VALUE_COUNT = 'value_count';

    const BUCKET_ADJACENCY_MATRIX = 'adjacency_matrix';
    const BUCKET_CHILDREN = 'children';
    const BUCKET_COMPOSITE = 'composite';
    const BUCKET_DATE_HISTOGRAM = 'date_histogram';
    const BUCKET_DATE_RANGE = 'date_range';
    const BUCKET_DIVERSIFIED_SAMPLER = 'diversified_sampler';
    const BUCKET_FILTER = 'filter';
    const BUCKET_FILTERS = 'filters';
    const BUCKET_GEO_DISTANCE = 'geo_distance';
    const BUCKET_GEOHASH_GRID = 'geohash_grid';
    const BUCKET_GLOBAL = 'global';
    const BUCKET_HISTOGRAM = 'histogram';
    const BUCKET_IP_RANGE = 'ip_range';
    const BUCKET_MISSING = 'missing';
    const BUCKET_NESTED = 'nested';
    const BUCKET_RANGE = 'range';
    const BUCKET_REVERSE_NESTED = 'reverse_nested';
    const BUCKET_SAMPLER = 'sampler';
    const BUCKET_SIGNIFICANT_TERMS = 'significant_terms';
    const BUCKET_SIGNIFICANT_TEXT = 'significant_text';
    const BUCKET_TERMS = 'terms';

    const PIPELINE_AVG_BUCKET = 'avg_bucket';
    const PIPELINE_DERIVATIVE = 'derivative';
    const PIPELINE_MAX_BUCKET = 'max_bucket';
    const PIPELINE_MIN_BUCKET = 'min_bucket';
    const PIPELINE_SUM_BUCKET = 'sum_bucket';
    const PIPELINE_STATS_BUCKET = 'stats_bucket';
    const PIPELINE_EXTENDED_STATS_BUCKET = 'extended_stats_bucket';
    const PIPELINE_PERCENTILES_BUCKET = 'percentiles_bucket';
    const PIPELINE_MOVING_AVG = 'moving_avg';
    const PIPELINE_CUMULATIVE_SUM = 'cumulative_sum';
    const PIPELINE_BUCKET_SCRIPT = 'bucket_script';
    const PIPELINE_BUCKET_SELECTOR = 'bucket_selector';
    const PIPELINE_BUCKET_SORT = 'bucket_sort';
    const PIPELINE_SERIAL_DIFF = 'serial_diff';

    const MATRIX_STATS = 'matrix_stats';
}