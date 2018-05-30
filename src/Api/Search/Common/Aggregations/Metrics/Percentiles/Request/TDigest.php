<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Metrics\Percentiles\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class TDigest extends AbstractRequest
{
    /**
     * @var int
     */
    private $compression;

    /**
     * @inheritdoc
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
     * @return static
     */
    public function setCompression(int $compression): TDigest
    {
        $this->compression = $compression;
        return $this;
    }
}