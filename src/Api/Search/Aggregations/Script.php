<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations;

class Script
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $lang;

    /**
     * @var string
     */
    private $source;

    /**
     * @var array
     */
    private $params;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if (!is_null($this->id)) {
            $dsl['id'] = $this->id;
        }
        if (!is_null($this->lang)) {
            $dsl['lang'] = $this->lang;
        }
        if (!is_null($this->source)) {
            $dsl['source'] = $this->source;
        }
        if (!is_null($this->params)) {
            $dsl['params'] = $this->params;
        }
        return $dsl;
    }

    /**
     * @param string $id
     * @return Script|static
     */
    public function setId(string $id): Script
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $lang
     * @return Script|static
     */
    public function setLang(string $lang): Script
    {
        $this->lang = $lang;
        return $this;
    }

    /**
     * @param string $source
     * @return Script|static
     */
    public function setSource(string $source): Script
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @param array $params
     * @return Script|static
     */
    public function setParams(array $params): Script
    {
        $this->params = $params;
        return $this;
    }
}