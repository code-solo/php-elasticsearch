<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc\MGet;

use CodeSolo\Elasticsearch\Api\MultiDoc\MGet\Response\Doc;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response
{
    /**
     * @var Doc[]
     */
    private $docs;

    /**
     * @param array $data
     * @return static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('docs', $data)) {
            throw new InvalidRawData();
        }
        $instance = new static();
        foreach ($data['docs'] as $doc) {
            $instance->docs[] = Doc::fromRawData($doc);
        }
        return $instance;
    }

    /**
     * Response constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return array
     */
    public function getDocs(): array
    {
        return $this->docs;
    }
}