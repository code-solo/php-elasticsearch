<?php

namespace CodeSolo\Elasticsearch\Client;

use CodeSolo\Elasticsearch\Exception\ClientNotFound;

class ClientPool
{
    /**
     * @var array
     */
    private $storage = [];

    /**
     * @var string
     */
    private $default;

    /**
     * @param string|null $name
     * @return ClientInterface
     * @throws ClientNotFound
     */
    public function get(string $name = null): ClientInterface
    {
        $name = $name ?? $this->default;
        if (array_key_exists($name, $this->storage)) {
            return $this->storage[$name];
        }
        throw new ClientNotFound();
    }

    /**
     * @param ClientInterface $client
     * @param bool $isDefault
     */
    public function add(ClientInterface $client, bool $isDefault = false)
    {
        if ($isDefault) {
            $this->default = $client->getName();
        }
        $this->storage[$client->getName()] = $client;
    }
}