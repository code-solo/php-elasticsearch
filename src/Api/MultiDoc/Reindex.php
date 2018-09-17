<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc;

use CodeSolo\Elasticsearch\Api\AbstractRequest;
use CodeSolo\Elasticsearch\ClientInterface;

class Reindex extends AbstractRequest
{
    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var array
     */
    private $body = [];

    /**
     * Bulk constructor.
     * @param ClientInterface $client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $body
     * @return static
     */
    public function setBody(array $body): Reindex
    {
        $this->body = $body;
        return $this;
    }
}