<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

trait MetricAggregationTrait
{
    public array $metricAggregations = [];

    /**
     * Set the metric aggregation.
     *
     * @param int $value
     * @return $this
     */
    public function metricAggregation(int $value): self
    {
        $this->metricAggregations[] = $value;

        return $this;
    }

    /**
     * Set the metric aggregations.
     *
     * @param int ...$items
     * @return $this
     */
    public function metricAggregations(int ...$items): self
    {
        foreach ($items as $item) {
            $this->metricAggregation($item);
        }

        return $this;
    }
}
