<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\SignificantText;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var bool
     */
    private $filterDuplicateText;

    /**
     * @var int
     */
    private $minDocCount;

    /**
     * @var int
     */
    private $shardMinDocCount;

    /**
     * @var Request\BackgroundFilter
     */
    private $backgroundFilter;

    /**
     * @var int
     */
    private $size;

    /**
     * @var int
     */
    private $shardSize;

    /**
     * @var string[]
     */
    private $sourceFields;

    /**
     * @var string|string[]|Request\Filter
     */
    private $include;

    /**
     * @var string|string[]|Request\Filter
     */
    private $exclude;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_SIGNIFICANT_TEXT;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->field)) {
            $dsl['field'] = $this->field;
        }
        if (!is_null($this->filterDuplicateText)) {
            $dsl['filter_duplicate_text'] = $this->filterDuplicateText;
        }
        if (!is_null($this->minDocCount)) {
            $dsl['min_doc_count'] = $this->minDocCount;
        }
        if (!is_null($this->shardMinDocCount)) {
            $dsl['shard_min_doc_count'] = $this->shardMinDocCount;
        }
        if (!is_null($this->backgroundFilter)) {
            $dsl['background_filter'] = $this->backgroundFilter->toDsl();
        }
        if (!is_null($this->size)) {
            $dsl['size'] = $this->size;
        }
        if (!is_null($this->shardSize)) {
            $dsl['shard_size'] = $this->shardSize;
        }
        if (!is_null($this->sourceFields)) {
            $dsl['source_fields'] = $this->sourceFields;
        }
        if (!is_null($this->include)) {
            $dsl['include'] = $this->include instanceof Request\Filter ? $this->include->toDsl() : $this->include;
        }
        if (!is_null($this->exclude)) {
            $dsl['exclude'] = $this->exclude instanceof Request\Filter ? $this->exclude->toDsl() : $this->exclude;
        }
        return $dsl;
    }

    /**
     * @param string $field
     * @return static
     */
    public function setField(string $field): Request
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @param bool $filterDuplicateText
     * @return static
     */
    public function setFilterDuplicateText(bool $filterDuplicateText): Request
    {
        $this->filterDuplicateText = $filterDuplicateText;
        return $this;
    }

    /**
     * @param int $minDocCount
     * @return static
     */
    public function setMinDocCount(int $minDocCount): Request
    {
        $this->minDocCount = $minDocCount;
        return $this;
    }

    /**
     * @param int $shardMinDocCount
     * @return static
     */
    public function setShardMinDocCount(int $shardMinDocCount): Request
    {
        $this->shardMinDocCount = $shardMinDocCount;
        return $this;
    }

    /**
     * @param Request\BackgroundFilter $backgroundFilter
     * @return static
     */
    public function setBackgroundFilter(Request\BackgroundFilter $backgroundFilter): Request
    {
        $this->backgroundFilter = $backgroundFilter;
        return $this;
    }

    /**
     * @param int $size
     * @return static
     */
    public function setSize(int $size): Request
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param int $shardSize
     * @return static
     */
    public function setShardSize(int $shardSize): Request
    {
        $this->shardSize = $shardSize;
        return $this;
    }

    /**
     * @param string[] $sourceFields
     * @return static
     */
    public function setSourceFields(array $sourceFields): Request
    {
        $this->sourceFields = $sourceFields;
        return $this;
    }

    /**
     * @param string|string[]|Request\Filter $include
     * @return static
     */
    public function setInclude($include): Request
    {
        $this->include = $include;
        return $this;
    }

    /**
     * @param string|string[]|Request\Filter $exclude
     * @return static
     */
    public function setExclude($exclude): Request
    {
        $this->exclude = $exclude;
        return $this;
    }
}