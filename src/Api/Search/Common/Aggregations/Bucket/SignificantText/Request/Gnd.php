<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\SignificantText\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class Gnd extends AbstractRequest
{
    /**
     * @var bool
     */
    private $backgroundIsSuperset;

    /**
     * @inheritdoc
     */
    public function toDsl(): array
    {
        $dsl = parent::toDsl();
        if (!is_null($this->backgroundIsSuperset)) {
            $dsl['background_is_superset'] = $this->backgroundIsSuperset;
        }
        return $dsl;
    }

    /**
     * @param bool $backgroundIsSuperset
     * @return static
     */
    public function setBackgroundIsSuperset(bool $backgroundIsSuperset): Gnd
    {
        $this->backgroundIsSuperset = $backgroundIsSuperset;
        return $this;
    }
}