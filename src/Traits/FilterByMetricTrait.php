<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use Google\Analytics\Data\V1beta\Filter;
use Google\Analytics\Data\V1beta\Filter\BetweenFilter;
use Google\Analytics\Data\V1beta\Filter\NumericFilter;
use Google\Analytics\Data\V1beta\FilterExpression;
use Google\Analytics\Data\V1beta\NumericValue;

trait FilterByMetricTrait
{
    public ?FilterExpression $metricFilter = null;

    /**
     * Apply where metric filter.
     *
     * @param  string  $name
     * @param  int  $operation
     * @param  int|string|float  $value
     * @return $this
     */
    public function whereMetric(string $name, int $operation, $value): self
    {
        $numericFilter = (new NumericFilter())
            ->setOperation($operation)
            ->setValue($this->getNumericObject($value));

        $filter = (new Filter())->setNumericFilter($numericFilter)
            ->setFieldName($name);

        $this->metricFilter = (new FilterExpression())
            ->setFilter($filter);

        return $this;
    }

    /**
     * Apply whereBetween metric filter.
     *
     * @param  string  $name
     * @param  int|string|float  $from
     * @param  int|string|float  $to
     * @return $this
     */
    public function whereMetricBetween(string $name, $from, $to): self
    {
        $betweenFilter = (new BetweenFilter())->setFromValue($this->getNumericObject($from))
            ->setToValue($this->getNumericObject($to));

        $filter = (new Filter())->setBetweenFilter($betweenFilter)
            ->setFieldName($name);

        $this->metricFilter = (new FilterExpression())
            ->setFilter($filter);

        return $this;
    }

    /**
     * Get numeric object from value.
     *
     * @param $value
     * @return NumericValue
     */
    private function getNumericObject($value): NumericValue
    {
        $numericValue = (new NumericValue());

        if (is_float($value)) {
            $numericValue->setDoubleValue($value);
        } else {
            $numericValue->setInt64Value($value);
        }

        return $numericValue;
    }
}
