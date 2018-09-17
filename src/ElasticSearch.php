<?php

namespace CodeSolo\Elasticsearch;

class ElasticSearch
{
    /**
     * @var static
     */
    protected static $instance;

    /**
     * @var ClientInterface[]
     */
    protected $clients;

    /**
     * @var string
     */
    protected $defaultClient;

    /**
     * @var Api\Doc\Action
     */
    protected $apiDoc;

    /**
     * @var Api\MultiDoc\Action
     */
    protected $apiMultiDoc;

    /**
     * @var Api\Search\Action
     */
    protected $apiSearch;

    /**
     * Constructor.
     */
    protected function __construct()
    {
        $this->apiDoc = new Api\Doc\Action();
        $this->apiMultiDoc = new Api\MultiDoc\Action();
        $this->apiSearch = new Api\Search\Action();
    }

    /**
     * @return static
     */
    public static function instance(): ElasticSearch
    {
        if (!static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * @param string|null $name
     * @return ClientInterface
     * @throws Exception\ClientNotFound
     */
    public function getClient(string $name = null): ClientInterface
    {
        $name = $name ?? $this->defaultClient;
        if (array_key_exists($name, $this->clients)) {
            return $this->clients[$name];
        }
        throw new Exception\ClientNotFound();
    }

    /**
     * @param ClientInterface $client
     * @param bool $isDefault
     * @return ElasticSearch
     */
    public function addClient(ClientInterface $client, bool $isDefault = false): ElasticSearch
    {
        if ($isDefault) {
            $this->defaultClient = $client->getName();
        }
        $this->clients[$client->getName()] = $client;
        return $this;
    }

    /**
     * @return Api\Doc\Action
     */
    public function doc(): Api\Doc\Action
    {
        return $this->apiDoc;
    }

    /**
     * @return Api\MultiDoc\Action
     */
    public function multiDoc(): Api\MultiDoc\Action
    {
        return $this->apiMultiDoc;
    }

    /**
     * @return Api\Search\Action
     */
    public function search(): Api\Search\Action
    {
        return $this->apiSearch;
    }
}