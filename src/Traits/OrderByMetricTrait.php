<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use Google\Analytics\Data\V1beta\OrderBy;
use Google\Analytics\Data\V1beta\OrderBy\MetricOrderBy;

trait OrderByMetricTrait
{
    /**
     * Set the order by metric.
     *
     * @param string $name
     * @param string $order
     * @return $this
     */
    public function orderByMetric(string $name, string $order = 'ASC'): self
    {
        $metricOrderBy = (new MetricOrderBy())
            ->setMetricName($name);

        $this->orderBys[] = (new OrderBy())
            ->setDesc($order !== 'ASC')
            ->setMetric($metricOrderBy);

        return $this;
    }

    /**
     * Set the desc order by metric.
     *
     * @param string $name
     * @return $this
     */
    public function orderByMetricDesc(string $name): self
    {
        return $this->orderByMetric($name, 'DESC');
    }
}
