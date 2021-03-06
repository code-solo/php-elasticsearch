<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc\MGet;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\Api\MultiDoc\MGet\Body\Doc;

class Body extends AbstractRequest
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
        $dsl = parent::toDsl();
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