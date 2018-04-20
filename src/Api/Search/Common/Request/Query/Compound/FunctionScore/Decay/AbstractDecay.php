<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Request\Query\Compound\FunctionScore\Decay;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

abstract class AbstractDecay extends AbstractRequest
{
    /**
     * @var string
     */
    private $multiValueMode;

    /**
     * @var string
     */
    private $field;

    /**
     * @var string|int
     */
    private $origin;

    /**
     * @var string
     */
    private $scale;

    /**
     * @var string
     */
    private $offset;

    /**
     * @var float
     */
    private $decay;

    /**
     * Gauss constructor.
     * @param string $field
     */
    public function __construct(string $field)
    {
        $this->field = $field;
    }

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        $dsl[$this->field] = $this->getBody();
        if (!is_null($this->multiValueMode)) {
            $dsl['multi_value_mode'] = $this->multiValueMode;
        }
        return $dsl;
    }

    /**
     * @param string $multiValueMode
     * @return static
     */
    public function setMultiValueMode($multiValueMode): AbstractDecay
    {
        $this->multiValueMode = $multiValueMode;
        return $this;
    }

    /**
     * @param string|int $origin
     * @return static
     */
    public function setOrigin($origin): AbstractDecay
    {
        $this->origin = $origin;
        return $this;
    }

    /**
     * @param string $scale
     * @return static
     */
    public function setScale(string $scale): AbstractDecay
    {
        $this->scale = $scale;
        return $this;
    }

    /**
     * @param string $offset
     * @return static
     */
    public function setOffset(string $offset): AbstractDecay
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @param float $decay
     * @return static
     */
    public function setDecay(float $decay): AbstractDecay
    {
        $this->decay = $decay;
        return $this;
    }

    /**
     * @return array
     */
    private function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->origin)) {
            $dsl['origin'] = $this->origin;
        }
        if (!is_null($this->scale)) {
            $dsl['scale'] = $this->scale;
        }
        if (!is_null($this->offset)) {
            $dsl['offset'] = $this->offset;
        }
        if (!is_null($this->decay)) {
            $dsl['decay'] = $this->decay;
        }
        return $dsl;
    }
}