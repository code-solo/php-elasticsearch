<?php

namespace MySpot\Elasticsearch\Driver\Api\MultiDoc\MGet;

use MySpot\Elasticsearch\Driver\Api\MultiDoc\MGet\Body\Doc;

class Body
{
    /**
     * @var Doc[]
     */
    private $docs;

    /**
     * @var string[]
     */
    private $ids;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if ($this->docs) {
            $dsl['docs'] = array_map(function(Doc $doc) {
                return $doc->toDsl();
            }, $this->docs);
        }
        if ($this->ids) {
            $dsl['ids'] = $this->ids;
        }
        return $dsl;
    }

    /**
     * @param Doc[] $docs
     * @return Body
     */
    public function setDocs(array $docs): Body
    {
        $this->docs = $docs;
        return $this;
    }

    /**
     * @param string[] $ids
     * @return Body
     */
    public function setIds(array $ids): Body
    {
        $this->ids = $ids;
        return $this;
    }
}