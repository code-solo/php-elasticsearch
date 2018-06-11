<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\DiversifiedSampler\Request;

final class ExecutionHint
{
    const MAP = 'map';
    const GLOBAL_ORDINALS = 'global_ordinals';
    const BYTES_HASH = 'bytes_hash';
}