<?php

namespace CodeSolo\Elasticsearch\Api\MultiDoc\MGet;

use CodeSolo\Elasticsearch\Api\AbstractResponse;
use CodeSolo\Elasticsearch\Api\MultiDoc\MGet\Response\Doc;
use CodeSolo\Elasticsearch\Exception\InvalidRawData;

class Response extends AbstractResponse
{
    /**
     * @var Doc[]
     */
    private $docs;

    /**
     * @inheritdoc
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
     * @inheritdoc
     */
    public function toRawData(): array
    {
        return [
            'docs' => array_map(function (Response\Doc $doc) {
                return $doc->toRawData();
            }, $this->docs),
        ];
    }

    /**
     * @return array
     */
    public function getDocs(): array
    {
        return $this->docs;
    }
}