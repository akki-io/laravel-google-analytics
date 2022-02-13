<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use Google\Analytics\Data\V1beta\Metric;

trait MetricTrait
{
    public array $metrics = [];

    /**
     * Set the metric.
     *
     * @param string $name
     * @return $this
     */
    public function metric(string $name): self
    {
        $this->metrics[] = (new Metric())
            ->setName($name);

        return $this;
    }

    /**
     * Set the metrics.
     *
     * @param string ...$items
     * @return $this
     */
    public function metrics(string ...$items): self
    {
        foreach ($items as $item) {
            $this->metric($item);
        }

        return $this;
    }
}
