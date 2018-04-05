<?php

namespace CodeSolo\Elasticsearch\Api;

abstract class AbstractRequest
{
    /**
     * @var array
     */
    private $customParams = [];

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        foreach ($this->customParams as $name => $value) {
            $dsl[$name] = ($value instanceof self) ? $value->toDsl() : $value;
        }
        return $dsl;
    }

    /**
     * @param string $name
     * @param $value
     * @return AbstractRequest|static
     */
    public function setCustomParam(string $name, $value): AbstractRequest
    {
        $this->customParams[$name] = $value;
        return $this;
    }
}