<?php

namespace CodeSolo\Elasticsearch\Api\Search\Aggregations;

trait ResponseCollectionTrait
{
    /**
     * @var AbstractResponse[]
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
     * @inheritdoc
     */
    public function getItem(AbstractRequest $request): AbstractResponse
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
                case Type::BUCKET_TERMS:
                    $item = Bucket\Terms\Response::fromRawData($data);
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