<?php

namespace CodeSolo\Elasticsearch\Api;

final class QueryType
{
    const MATCH_ALL = 'match_all';
    const MATCH_NONE = 'match_none';

    const MATCH = 'match';
    const MATCH_PHRASE = 'match_phrase';
    const MATCH_PHRASE_PREFIX = 'match_phrase_prefix';
    const MULTI_MATCH = 'multi_match';
    const COMMON = 'common';
    const QUERY_STRING = 'query_string';
    const SIMPLE_QUERY_STRING = 'simple_query_string';

    const TERM = 'term';
    const TERMS = 'terms';
    const TERMS_SET = 'terms_set';
    const RANGE = 'range';
    const EXISTS = 'exists';
    const PREFIX = 'prefix';
    const WILDCARD = 'wildcard';
    const REGEXP = 'regexp';
    const FUZZY = 'fuzzy';
    const TYPE = 'type';
    const IDS = 'ids';

    const CONSTANT_SCORE = 'constant_score';
    const BOOL = 'bool';
    const DIS_MAX = 'dis_max';
    const FUNCTION_SCORE = 'function_score';
    const BOOSTING = 'boosting';
    const NESTED = 'nested';
    const HAS_CHILD = 'has_child';
    const HAS_PARENT = 'has_parent';
    const PARENT_ID = 'parent_id';

    const GEO_SHAPE = 'geo_shape';
    const GEO_BOUNDING_BOX = 'geo_bounding_box';
    const GEO_DISTANCE = 'geo_distance';
    const GEO_POLYGON = 'geo_polygon';

    const MORE_LIKE_THIS = 'more_like_this';
    const SCRIPT = 'script';
    const PERCOLATE = 'percolate';
    const WRAPPER = 'wrapper';

    const SPAN_TERM = 'span_term';
    const SPAN_MULTI = 'span_multi';
    const SPAN_FIRST = 'span_first';
    const SPAN_NEAR = 'span_near';
    const SPAN_OR = 'span_or';
    const SPAN_NOT = 'span_not';
    const SPAN_CONTAINING = 'span_containing';
    const SPAN_WITHIN = 'span_within';
    const FIELD_MASKING_SPAN = 'field_masking_span';
}