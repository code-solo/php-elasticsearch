<?php

namespace CodeSolo\Elasticsearch;

class Api
{
    /**
     * @var Api\ApiDoc
     */
    private $doc;

    /**
     * @var Api\ApiMultiDoc
     */
    private $multiDoc;

    /**
     * @var Api\ApiSearch
     */
    private $search;

    /**
     * @return Api\ApiDoc
     */
    public function doc(): Api\ApiDoc
    {
        if (!$this->doc) {
            $this->doc = new Api\ApiDoc();
        }
        return $this->doc;
    }
}