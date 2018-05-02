<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\Terms;

use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\AbstractRequest;
use CodeSolo\Elasticsearch\Api\AggregationsType;

class Request extends AbstractRequest
{
    /**
     * @var string
     */
    private $field;

    /**
     * @var int
     */
    private $size;

    /**
     * @var bool
     */
    private $showTermDocCountError;

    /**
     * @inheritdoc
     */
    public function getType(): string
    {
        return AggregationsType::BUCKET_TERMS;
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
        if (!is_null($this->size)) {
            $dsl['size'] = $this->size;
        }
        if (!is_null($this->showTermDocCountError)) {
            $dsl['show_term_doc_count_error'] = $this->showTermDocCountError;
        }
        return $dsl;
    }

    /**
     * @param string $field
     * @return Request|static
     */
    public function setField(string $field): Request
    {
        $this->field = $field;
        return $this;
    }

    /**
     * @param int $size
     * @return Request|static
     */
    public function setSize(int $size): Request
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param bool $showTermDocCountError
     * @return Request|static
     */
    public function setShowTermDocCountError(bool $showTermDocCountError): Request
    {
        $this->showTermDocCountError = $showTermDocCountError;
        return $this;
    }
}