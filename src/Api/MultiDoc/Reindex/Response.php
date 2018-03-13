<?php

namespace MySpot\Elasticsearch\Driver\Api\MultiDoc\Reindex;

use MySpot\Elasticsearch\Driver\Api\MultiDoc\Reindex\Response\Retries;
use MySpot\Elasticsearch\Driver\Exception\InvalidRawData;

class Response
{
    /**
     * @var int
     */
    private $took;

    /**
     * @var bool
     */
    private $timedOut;

    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $created;

    /**
     * @var int
     */
    private $updated;

    /**
     * @var int
     */
    private $deleted;

    /**
     * @var int
     */
    private $batches;

    /**
     * @var int
     */
    private $versionConflicts;

    /**
     * @var int
     */
    private $noops;

    /**
     * @var Retries
     */
    private $retries;

    /**
     * @var int
     */
    private $throttledMillis;

    /**
     * @var int
     */
    private $requestsPerSecond;

    /**
     * @var int
     */
    private $throttledUntilMillis;

    /**
     * @var array
     */
    private $failures;

    /**
     * @param array $data
     * @return static
     * @throws InvalidRawData
     */
    public static function fromRawData(array $data): Response
    {
        if (!array_key_exists('took', $data) ||
            !array_key_exists('timed_out', $data) ||
            !array_key_exists('total', $data) ||
            !array_key_exists('created', $data) ||
            !array_key_exists('updated', $data) ||
            !array_key_exists('deleted', $data) ||
            !array_key_exists('batches', $data) ||
            !array_key_exists('version_conflicts', $data) ||
            !array_key_exists('noops', $data) ||
            !array_key_exists('retries', $data) ||
            !array_key_exists('throttled_millis', $data) ||
            !array_key_exists('requests_per_second', $data) ||
            !array_key_exists('throttled_until_millis', $data) ||
            !array_key_exists('failures', $data)
        ) {
            throw new InvalidRawData();
        }
        $instance = new static();
        $instance->took = $data['took'];
        $instance->timedOut = $data['timed_out'];
        $instance->total = $data['total'];
        $instance->created = $data['created'];
        $instance->updated = $data['updated'];
        $instance->deleted = $data['deleted'];
        $instance->batches = $data['batches'];
        $instance->versionConflicts = $data['version_conflicts'];
        $instance->noops = $data['noops'];
        $instance->retries = Retries::fromRawData($data['retries']);
        $instance->throttledMillis = $data['throttled_millis'];
        $instance->requestsPerSecond = $data['requests_per_second'];
        $instance->throttledUntilMillis = $data['throttled_until_millis'];
        $instance->failures = $data['failures'];
        return $instance;
    }

    /**
     * Response constructor.
     */
    private function __construct()
    {
    }

    /**
     * @return int
     */
    public function getTook(): int
    {
        return $this->took;
    }

    /**
     * @return bool
     */
    public function getTimedOut(): bool
    {
        return $this->timedOut;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return int
     */
    public function getCreated(): int
    {
        return $this->created;
    }

    /**
     * @return int
     */
    public function getUpdated(): int
    {
        return $this->updated;
    }

    /**
     * @return int
     */
    public function getDeleted(): int
    {
        return $this->deleted;
    }

    /**
     * @return int
     */
    public function getBatches(): int
    {
        return $this->batches;
    }

    /**
     * @return int
     */
    public function getVersionConflicts(): int
    {
        return $this->versionConflicts;
    }

    /**
     * @return int
     */
    public function getNoops(): int
    {
        return $this->noops;
    }

    /**
     * @return Retries
     */
    public function getRetries(): Retries
    {
        return $this->retries;
    }

    /**
     * @return int
     */
    public function getThrottledMillis(): int
    {
        return $this->throttledMillis;
    }

    /**
     * @return int
     */
    public function getRequestsPerSecond(): int
    {
        return $this->requestsPerSecond;
    }

    /**
     * @return int
     */
    public function getThrottledUntilMillis(): int
    {
        return $this->throttledUntilMillis;
    }

    /**
     * @return array
     */
    public function getFailures(): array
    {
        return $this->failures;
    }
}