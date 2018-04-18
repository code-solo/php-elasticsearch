<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\FullText\MultiMatch;

final class Type
{
    const BEST_FIELDS = 'best_fields';
    const MOST_FIELDS = 'most_fields';
    const CROSS_FIELDS = 'cross_fields';
    const PHRASE = 'phrase';
    const PHRASE_PREFIX = 'phrase_prefix';
}