<?php

namespace CodeSolo\Elasticsearch\Api;

abstract class AbstractRequest
{
    /**
     * @var array
     */
    private $params = [];

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        foreach ($this->params as $name => $value) {
            $dsl[$name] = ($value instanceof self) ? $value->toDsl() : $value;
        }
        return $dsl;
    }

    /**
     * @param string $name
     * @param $value
     * @return AbstractRequest|static
     */
    public function setParam(string $name, $value): AbstractRequest
    {
        $this->params[$name] = $value;
        return $this;
    }
}