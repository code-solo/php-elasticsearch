<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\Nested;

final class ScoreMode
{
    const VG = 'avg';
    const SUM = 'sum';
    const MIN = 'min';
    const MAX = 'max';
    const NONE = 'none';
}