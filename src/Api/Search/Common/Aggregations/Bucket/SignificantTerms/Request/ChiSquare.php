<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Aggregations\Bucket\SignificantTerms\Request;

use CodeSolo\Elasticsearch\Api\AbstractRequest;

class ChiSquare extends AbstractRequest
{
    /**
     * @var bool
     */
    private $includeNegatives;

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
        if (!is_null($this->includeNegatives)) {
            $dsl['include_negatives'] = $this->includeNegatives;
        }
        if (!is_null($this->backgroundIsSuperset)) {
            $dsl['background_is_superset'] = $this->backgroundIsSuperset;
        }
        return $dsl;
    }

    /**
     * @param bool $includeNegatives
     * @return static
     */
    public function setIncludeNegatives(bool $includeNegatives): ChiSquare
    {
        $this->includeNegatives = $includeNegatives;
        return $this;
    }

    /**
     * @param bool $backgroundIsSuperset
     * @return static
     */
    public function setBackgroundIsSuperset(bool $backgroundIsSuperset): ChiSquare
    {
        $this->backgroundIsSuperset = $backgroundIsSuperset;
        return $this;
    }
}