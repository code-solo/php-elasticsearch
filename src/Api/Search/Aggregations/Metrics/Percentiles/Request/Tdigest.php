<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations\Metrics\Percentiles\Request;

class TDigest
{
    /**
     * @var int
     */
    private $compression;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if (!is_null($this->compression)) {
            $dsl['compression'] = $this->compression;
        }
        return $dsl;
    }

    /**
     * @param int $compression
     * @return TDigest|static
     */
    public function setCompression(int $compression): TDigest
    {
        $this->compression = $compression;
        return $this;
    }
}