<?php

namespace CodeSolo\Elasticsearch\Api\Search\Common\Response;

use CodeSolo\Elasticsearch\Api\AggregationsType;
use CodeSolo\Elasticsearch\Api\Search\Common\Aggregations as Aggs;

class Aggregations
{
    /**
     * @var Aggs\AbstractResponse[]
     */
    private $decodedItems = [];

    /**
     * @var array
     */
    private $rawData = [];

    /**
     * @param array $data
     * @return static
     */
    public static function fromRawData(array $data)
    {
        $instance = new static();
        $instance->rawData = $data;
        return $instance;
    }

    /**
     * @param Aggs\AbstractRequest $request
     * @return Aggs\AbstractResponse
     * @throws \Exception
     */
    public function getItem(Aggs\AbstractRequest $request): Aggs\AbstractResponse
    {
        $name = $request->getName();
        $type = $request->getType();

        if (!array_key_exists($name, $this->rawData)) {
            // TODO change it
            throw new \Exception();
        }
        if (!array_key_exists($name, $this->decodedItems)) {
            $data = $this->rawData[$name];

            switch ($type) {
                case AggregationsType::BUCKET_TERMS:
                    $item = Aggs\Bucket\Terms\Response::fromRawData($data);
                    break;

                case AggregationsType::METRICS_AVG:
                    $item = Aggs\Metrics\Avg\Response::fromRawData($data);
                    break;

                default:
                    // TODO change it
                    throw new \Exception();
            }
            $this->decodedItems[$name] = $item;
        }
        return $this->decodedItems[$name];
    }
}