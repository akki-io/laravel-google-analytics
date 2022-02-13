<?php

namespace AkkiIo\LaravelGoogleAnalytics;

use AkkiIo\LaravelGoogleAnalytics\Traits\CustomAcquisitionTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\CustomEngagementTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\CustomRetentionTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\DateRangeTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\DimensionTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\FilterByDimensionTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\FilterByMetricTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\MetricAggregationTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\MetricTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\OrderByDimensionTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\OrderByMetricTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\ResponseTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\RowOperationTrait;
use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;

class LaravelGoogleAnalytics
{
    use DateRangeTrait;
    use MetricTrait;
    use DimensionTrait;
    use OrderByMetricTrait;
    use OrderByDimensionTrait;
    use MetricAggregationTrait;
    use FilterByDimensionTrait;
    use FilterByMetricTrait;
    use RowOperationTrait;
    use CustomAcquisitionTrait;
    use CustomEngagementTrait;
    use CustomRetentionTrait;
    use ResponseTrait;

    public ?int $propertyId = null;
    public $credentials = null;
    public array $orderBys = [];

    /**
     * Set the property id.
     *
     * @param  null  $propertyId
     * @return $this
     */
    public function setPropertyId($propertyId = null): self
    {
        $this->propertyId = $propertyId ?? config('laravel-google-analytics.property_id');

        return $this;
    }

    /**
     * Get the property id.
     *
     * @return int|null
     */
    public function getPropertyId(): ?int
    {
        if (! $this->propertyId) {
            $this->setPropertyId();
        }

        return $this->propertyId;
    }

    /**
     * Set the credentials.
     *
     * @param  null  $credentials
     * @return $this
     */
    public function setCredentials($credentials = null): self
    {
        $this->credentials = $credentials ?? config('laravel-google-analytics.service_account_credentials_json');

        return $this;
    }

    /**
     * Get the credentials.
     *
     * @return mixed
     */
    public function getCredentials()
    {
        if (! $this->credentials) {
            $this->setCredentials();
        }

        return $this->credentials;
    }

    /**
     * Get the client.
     *
     * @return BetaAnalyticsDataClient
     * @throws \Google\ApiCore\ValidationException
     */
    public function getClient(): BetaAnalyticsDataClient
    {
        return new BetaAnalyticsDataClient([
            'credentials' => $this->getCredentials(),
        ]);
    }

    /**
     * Get the result from the GA4 query explorer.
     *
     * @return LaravelGoogleAnalyticsResponse
     *
     * @throws \Google\ApiCore\ApiException|\Google\ApiCore\ValidationException
     */
    public function get(): LaravelGoogleAnalyticsResponse
    {
        $response = $this->getClient()->runReport([
            'property' => "properties/{$this->getPropertyId()}",
            'dateRanges' => $this->dateRanges,
            'metrics' => $this->metrics,
            'dimensions' => $this->dimensions,
            'orderBys' => $this->orderBys,
            'metricAggregations' => $this->metricAggregations,
            'dimensionFilter' => $this->dimensionFilter,
            'metricFilter' => $this->metricFilter,
            'limit' => $this->limit,
            'offset' => $this->offset,
            'keepEmptyRows' => $this->keepEmptyRows,
        ]);

        return $this->formatResponse($response);
    }
}
