<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Terms\Request;

final class ExecutionHint
{
    const MAP = 'map';
    const GLOBAL_ORDINALS = 'global_ordinals';
}