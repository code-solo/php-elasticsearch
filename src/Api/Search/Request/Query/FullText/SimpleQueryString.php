<?php

namespace CodeSolo\Elasticsearch\Api\Search\Request\Query\FullText;

use CodeSolo\Elasticsearch\Api\QueryType;
use CodeSolo\Elasticsearch\Api\Search\Request\Query\AbstractClause;

class SimpleQueryString extends AbstractClause
{
    /**
     * @var string
     */
    private $query;

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
    private $flags;

    /**
     * @var int
     */
    private $fuzzyMaxExpansions;

    /**
     * @var int
     */
    private $fuzzyPrefixLength;

    /**
     * @var bool
     */
    private $fuzzyTranspositions;

    /**
     * @var bool
     */
    private $analyzeWildcard;

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
    private $quoteFieldSuffix;

    /**
     * @var bool
     */
    private $autoGenerateSynonymsPhraseQuery;

    /**
     * @var array
     */
    private $fields;

    /**
     * @inheritdoc
     */
    protected function getType(): string
    {
        return QueryType::SIMPLE_QUERY_STRING;
    }

    /**
     * @inheritdoc
     */
    protected function getBody(): array
    {
        $dsl = [];
        if (!is_null($this->query)) {
            $dsl['query'] = $this->query;
        }
        if (!is_null($this->defaultOperator)) {
            $dsl['default_operator'] = $this->defaultOperator;
        }
        if (!is_null($this->analyzer)) {
            $dsl['analyzer'] = $this->analyzer;
        }
        if (!is_null($this->flags)) {
            $dsl['flags'] = $this->flags;
        }
        if (!is_null($this->fuzzyMaxExpansions)) {
            $dsl['fuzzy_max_expansions'] = $this->fuzzyMaxExpansions;
        }
        if (!is_null($this->fuzzyPrefixLength)) {
            $dsl['fuzzy_prefix_length'] = $this->fuzzyPrefixLength;
        }
        if (!is_null($this->fuzzyTranspositions)) {
            $dsl['fuzzy_transpositions'] = $this->fuzzyTranspositions;
        }
        if (!is_null($this->analyzeWildcard)) {
            $dsl['analyze_wildcard'] = $this->analyzeWildcard;
        }
        if (!is_null($this->minimumShouldMatch)) {
            $dsl['minimum_should_match'] = $this->minimumShouldMatch;
        }
        if (!is_null($this->lenient)) {
            $dsl['lenient'] = $this->lenient;
        }
        if (!is_null($this->quoteFieldSuffix)) {
            $dsl['quote_field_suffix'] = $this->quoteFieldSuffix;
        }
        if (!is_null($this->autoGenerateSynonymsPhraseQuery)) {
            $dsl['auto_generate_synonyms_phrase_query'] = $this->autoGenerateSynonymsPhraseQuery;
        }
        if (!is_null($this->fields)) {
            $dsl['fields'] = $this->fields;
        }
        return $dsl;
    }

    /**
     * @param string $query
     * @return SimpleQueryString|static
     */
    public function setQuery(string $query): SimpleQueryString
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param string $defaultOperator
     * @return SimpleQueryString|static
     */
    public function setDefaultOperator(string $defaultOperator): SimpleQueryString
    {
        $this->defaultOperator = $defaultOperator;
        return $this;
    }

    /**
     * @param string $analyzer
     * @return SimpleQueryString|static
     */
    public function setAnalyzer(string $analyzer): SimpleQueryString
    {
        $this->analyzer = $analyzer;
        return $this;
    }

    /**
     * @param string $flags
     * @return SimpleQueryString|static
     */
    public function setFlags(string $flags): SimpleQueryString
    {
        $this->flags = $flags;
        return $this;
    }

    /**
     * @param int $fuzzyMaxExpansions
     * @return SimpleQueryString|static
     */
    public function setFuzzyMaxExpansions(int $fuzzyMaxExpansions): SimpleQueryString
    {
        $this->fuzzyMaxExpansions = $fuzzyMaxExpansions;
        return $this;
    }

    /**
     * @param int $fuzzyPrefixLength
     * @return SimpleQueryString|static
     */
    public function setFuzzyPrefixLength(int $fuzzyPrefixLength): SimpleQueryString
    {
        $this->fuzzyPrefixLength = $fuzzyPrefixLength;
        return $this;
    }

    /**
     * @param bool $fuzzyTranspositions
     * @return SimpleQueryString|static
     */
    public function setFuzzyTranspositions(bool $fuzzyTranspositions): SimpleQueryString
    {
        $this->fuzzyTranspositions = $fuzzyTranspositions;
        return $this;
    }

    /**
     * @param bool $analyzeWildcard
     * @return SimpleQueryString|static
     */
    public function setAnalyzeWildcard(bool $analyzeWildcard): SimpleQueryString
    {
        $this->analyzeWildcard = $analyzeWildcard;
        return $this;
    }

    /**
     * @param int|string $minimumShouldMatch
     * @return SimpleQueryString|static
     */
    public function setMinimumShouldMatch($minimumShouldMatch): SimpleQueryString
    {
        $this->minimumShouldMatch = $minimumShouldMatch;
        return $this;
    }

    /**
     * @param bool $lenient
     * @return SimpleQueryString|static
     */
    public function setLenient(bool $lenient): SimpleQueryString
    {
        $this->lenient = $lenient;
        return $this;
    }

    /**
     * @param string $quoteFieldSuffix
     * @return SimpleQueryString|static
     */
    public function setQuoteFieldSuffix(string $quoteFieldSuffix): SimpleQueryString
    {
        $this->quoteFieldSuffix = $quoteFieldSuffix;
        return $this;
    }

    /**
     * @param bool $autoGenerateSynonymsPhraseQuery
     * @return SimpleQueryString|static
     */
    public function setAutoGenerateSynonymsPhraseQuery(bool $autoGenerateSynonymsPhraseQuery): SimpleQueryString
    {
        $this->autoGenerateSynonymsPhraseQuery = $autoGenerateSynonymsPhraseQuery;
        return $this;
    }

    /**
     * @param array $fields
     * @return SimpleQueryString|static
     */
    public function setFields(array $fields): SimpleQueryString
    {
        $this->fields = $fields;
        return $this;
    }
}