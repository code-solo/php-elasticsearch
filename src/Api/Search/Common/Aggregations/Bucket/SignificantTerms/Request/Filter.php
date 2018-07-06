<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\SignificantTerms\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class Filter extends AbstractRequest
{
    /**
     * @var int
     */
    private $partition;

    /**
     * @var int
     */
    private $numPartitions;

    /**
     * @inheritdoc
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if (!is_null($this->partition)) {
            $dsl['partition'] = $this->partition;
        }
        if (!is_null($this->numPartitions)) {
            $dsl['num_partitions'] = $this->numPartitions;
        }
        return $dsl;
    }

    /**
     * @param int $partition
     * @return static
     */
    public function setPartition(int $partition): Filter
    {
        $this->partition = $partition;
        return $this;
    }

    /**
     * @param int $numPartitions
     * @return static
     */
    public function setNumPartitions(int $numPartitions): Filter
    {
        $this->numPartitions = $numPartitions;
        return $this;
    }
}