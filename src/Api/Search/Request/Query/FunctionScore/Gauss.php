<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\FunctionScore;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class Gauss extends AbstractRequest
{
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
        return [
            $this->field => $this->getBody()
        ];
    }

    /**
     * @param string|int $origin
     * @return Gauss|static
     */
    public function setOrigin($origin): Gauss
    {
        $this->origin = $origin;
        return $this;
    }

    /**
     * @param string $scale
     * @return Gauss|static
     */
    public function setScale(string $scale): Gauss
    {
        $this->scale = $scale;
        return $this;
    }

    /**
     * @param string $offset
     * @return Gauss|static
     */
    public function setOffset(string $offset): Gauss
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @param float $decay
     * @return Gauss|static
     */
    public function setDecay(float $decay): Gauss
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