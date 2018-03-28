<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query;

class QueryString
{
    /**
     * @var string
     */
    private $query;

    /**
     * @var string
     */
    private $defaultField;

    /**
     * @var string
     */
    private $defaultOperator;

    /**
     * @var string
     */
    private $analyzer;

    /**
     * @var string
     */
    private $quoteAnalyzer;

    /**
     * @var bool|string
     */
    private $allowLeadingWildcard;

    /**
     * @var bool
     */
    private $enablePositionIncrements;

    /**
     * @var int
     */
    private $fuzzyMaxExpansions;

    /**
     * @var string
     */
    private $fuzziness;

    /**
     * @var int
     */
    private $fuzzyPrefixLength;

    /**
     * @var bool
     */
    private $fuzzyTranspositions;

    /**
     * @var int
     */
    private $phraseSlop;

    /**
     * @var float
     */
    private $boost;

    /**
     * @var bool
     */
    private $autoGeneratePhraseQueries;

    /**
     * @var bool
     */
    private $analyzeWildcard;

    /**
     * @var int
     */
    private $maxDeterminizedStates;

    /**
     * @var int|string
     */
    private $minimumShouldMatch;

    /**
     * @var bool
     */
    private $lenient;

    /**
     * @var string
     */
    private $timeZone;

    /**
     * @var string
     */
    private $quoteFieldSuffix;

    /**
     * @var bool
     */
    private $autoGenerateSynonymsPhraseQuery;

    /**
     * @return array
     */
    public function toDsl(): array
    {
        $dsl = [];
        if (!is_null($this->query)) {
            $dsl['query'] = $this->query;
        }
        if (!is_null($this->defaultField)) {
            $dsl['default_field'] = $this->defaultField;
        }
        if (!is_null($this->defaultOperator)) {
            $dsl['default_operator'] = $this->defaultOperator;
        }
        if (!is_null($this->analyzer)) {
            $dsl['analyzer'] = $this->analyzer;
        }
        if (!is_null($this->quoteAnalyzer)) {
            $dsl['quote_analyzer'] = $this->quoteAnalyzer;
        }
        if (!is_null($this->allowLeadingWildcard)) {
            $dsl['allow_leading_wildcard'] = $this->allowLeadingWildcard;
        }
        if (!is_null($this->enablePositionIncrements)) {
            $dsl['enable_position_increments'] = $this->enablePositionIncrements;
        }
        if (!is_null($this->fuzzyMaxExpansions)) {
            $dsl['fuzzy_max_expansions'] = $this->fuzzyMaxExpansions;
        }
//        if (!is_null($this->)) {
//            $dsl[''] = $this->;
//        }
//        if (!is_null($this->)) {
//            $dsl[''] = $this->;
//        }
//        if (!is_null($this->)) {
//            $dsl[''] = $this->;
//        }
//        if (!is_null($this->)) {
//            $dsl[''] = $this->;
//        }
//        if (!is_null($this->)) {
//            $dsl[''] = $this->;
//        }
//        if (!is_null($this->)) {
//            $dsl[''] = $this->;
//        }
//        if (!is_null($this->)) {
//            $dsl[''] = $this->;
//        }
        return $dsl;
    }

    /**
     * @param string $query
     * @return QueryString|static
     */
    public function setQuery(string $query): QueryString
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string $defaultField
     * @return QueryString|static
     */
    public function setDefaultField(string $defaultField): QueryString
    {
        $this->defaultField = $defaultField;
        return $this;
    }

    /**
     * @param string $defaultOperator
     * @return QueryString|static
     */
    public function setDefaultOperator(string $defaultOperator): QueryString
    {
        $this->defaultOperator = $defaultOperator;
        return $this;
    }

    /**
     * @param string $analyzer
     * @return QueryString|static
     */
    public function setAnalyzer(string $analyzer): QueryString
    {
        $this->analyzer = $analyzer;
        return $this;
    }

    /**
     * @param string $quoteAnalyzer
     * @return QueryString|static
     */
    public function setQuoteAnalyzer(string $quoteAnalyzer): QueryString
    {
        $this->quoteAnalyzer = $quoteAnalyzer;
        return $this;
    }

    /**
     * @param bool|string $allowLeadingWildcard
     * @return QueryString|static
     */
    public function setAllowLeadingWildcard($allowLeadingWildcard): QueryString
    {
        $this->allowLeadingWildcard = $allowLeadingWildcard;
        return $this;
    }

    /**
     * @param bool $enablePositionIncrements
     * @return QueryString|static
     */
    public function setEnablePositionIncrements(bool $enablePositionIncrements): QueryString
    {
        $this->enablePositionIncrements = $enablePositionIncrements;
        return $this;
    }

    /**
     * @param int $fuzzyMaxExpansions
     * @return QueryString|static
     */
    public function setFuzzyMaxExpansions(int $fuzzyMaxExpansions): QueryString
    {
        $this->fuzzyMaxExpansions = $fuzzyMaxExpansions;
        return $this;
    }

    /**
     * @param string $fuzziness
     * @return QueryString|static
     */
    public function setFuzziness(string $fuzziness): QueryString
    {
        $this->fuzziness = $fuzziness;
        return $this;
    }

    /**
     * @param int $fuzzyPrefixLength
     * @return QueryString|static
     */
    public function setFuzzyPrefixLength(int $fuzzyPrefixLength): QueryString
    {
        $this->fuzzyPrefixLength = $fuzzyPrefixLength;
        return $this;
    }

    /**
     * @param bool $fuzzyTranspositions
     * @return QueryString|static
     */
    public function setFuzzyTranspositions(bool $fuzzyTranspositions): QueryString
    {
        $this->fuzzyTranspositions = $fuzzyTranspositions;
        return $this;
    }

    /**
     * @param int $phraseSlop
     * @return QueryString|static
     */
    public function setPhraseSlop(int $phraseSlop): QueryString
    {
        $this->phraseSlop = $phraseSlop;
        return $this;
    }

    /**
     * @param float $boost
     * @return QueryString|static
     */
    public function setBoost(float $boost): QueryString
    {
        $this->boost = $boost;
        return $this;
    }

    /**
     * @param bool $autoGeneratePhraseQueries
     * @return QueryString|static
     */
    public function setAutoGeneratePhraseQueries(bool $autoGeneratePhraseQueries): QueryString
    {
        $this->autoGeneratePhraseQueries = $autoGeneratePhraseQueries;
        return $this;
    }

    /**
     * @param bool $analyzeWildcard
     * @return QueryString|static
     */
    public function setAnalyzeWildcard(bool $analyzeWildcard): QueryString
    {
        $this->analyzeWildcard = $analyzeWildcard;
        return $this;
    }

    /**
     * @param int $maxDeterminizedStates
     * @return QueryString|static
     */
    public function setMaxDeterminizedStates(int $maxDeterminizedStates): QueryString
    {
        $this->maxDeterminizedStates = $maxDeterminizedStates;
        return $this;
    }

    /**
     * @param int|string $minimumShouldMatch
     * @return QueryString|static
     */
    public function setMinimumShouldMatch($minimumShouldMatch): QueryString
    {
        $this->minimumShouldMatch = $minimumShouldMatch;
        return $this;
    }

    /**
     * @param bool $lenient
     * @return QueryString|static
     */
    public function setLenient(bool $lenient): QueryString
    {
        $this->lenient = $lenient;
        return $this;
    }

    /**
     * @param string $timeZone
     * @return QueryString|static
     */
    public function setTimeZone(string $timeZone): QueryString
    {
        $this->timeZone = $timeZone;
        return $this;
    }

    /**
     * @param string $quoteFieldSuffix
     * @return QueryString|static
     */
    public function setQuoteFieldSuffix(string $quoteFieldSuffix): QueryString
    {
        $this->quoteFieldSuffix = $quoteFieldSuffix;
        return $this;
    }

    /**
     * @param bool $autoGenerateSynonymsPhraseQuery
     * @return QueryString|static
     */
    public function setAutoGenerateSynonymsPhraseQuery(bool $autoGenerateSynonymsPhraseQuery): QueryString
    {
        $this->autoGenerateSynonymsPhraseQuery = $autoGenerateSynonymsPhraseQuery;
        return $this;
    }
}