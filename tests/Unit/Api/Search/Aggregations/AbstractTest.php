<?php

namespace CodeSolo\ElasticsearchTests\Unit\Api\Search\Aggregations;

use CodeSolo\Elasticsearch\Api\Search;
use PHPUnit\Framework\TestCase;
use CodeSolo\Elasticsearch\Connection\ConnectionInterface;
use CodeSolo\Elasticsearch\Connection\Connection;

abstract class AbstractTest extends TestCase
{
    /**
     * @var ConnectionInterface
     */
    protected $connection;

    /**
     * @var Search
     */
    protected $search;

    /**
     * @var Search\Request\Aggregations
     */
    protected $aggregations;

    /**
     * @var string
     */
    protected $index = '';

    /**
     * @var string
     */
    protected $type = 'doc';

    public function __construct(string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->index = strtolower(
            str_replace(
                '\\',
                '_',
                static::class
            )
        );
    }

    /**
     * @return array
     */
    abstract protected function getFixtures(): array;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $this->connection = new Connection();
        foreach ($this->getFixtures() as $doc) {
            $this->connection->getClient()->index([
                'index' => $this->index,
                'type' => $this->type,
                'body' => $doc,
            ]);
        }
        $this->connection->getClient()->indices()->refresh([
            'index' => $this->index,
        ]);
        $this->aggregations = new Search\Request\Aggregations();
        $this->search = new Search($this->connection);
        $this->search
            ->setIndex($this->index)
            ->setType($this->type)
//            ->setSize(0)
            ->setAggregations($this->aggregations);
    }

    /**
     * @inheritdoc
     */
    public function tearDown()
    {
        $this->connection->getClient()->indices()->delete([
            'index' => $this->index,
        ]);
    }
}