<?php

namespace AkkiIo\LaravelGoogleAnalytics;

use AkkiIo\LaravelGoogleAnalytics\Traits\DateRangeTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\DimensionTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\MetricAggregationTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\MetricTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\OrderByDimensionTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\OrderByMetricTrait;
use AkkiIo\LaravelGoogleAnalytics\Traits\ResponseTrait;
use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;

class LaravelGoogleAnalytics
{
    use DateRangeTrait;
    use MetricTrait;
    use DimensionTrait;
    use OrderByMetricTrait;
    use OrderByDimensionTrait;
    use MetricAggregationTrait;
    use ResponseTrait;

    public BetaAnalyticsDataClient $client;
    public int $propertyId;
    public array $orderBys = [];

    /**
     * Class construct.
     *
     * @throws \Google\ApiCore\ValidationException
     */
    public function __construct()
    {
        $this->client = new BetaAnalyticsDataClient([
            'credentials' => config('laravel-google-analytics.service_account_credentials_json'),
        ]);

        $this->propertyId();
    }

    /**
     * Set the property id.
     *
     * @param null $propertyId
     * @return $this
     */
    public function propertyId($propertyId = null): self
    {
        $this->propertyId = $propertyId ?? config('laravel-google-analytics.property_id');

        return $this;
    }

    /**
     * Get the result from the GA4 query explorer.
     *
     * @return LaravelGoogleAnalyticsResponse
     * @throws \Google\ApiCore\ApiException
     */
    public function get(): LaravelGoogleAnalyticsResponse
    {
        $response = $this->client->runReport([
            'property' => "properties/{$this->propertyId}",
            'dateRanges' => $this->dateRanges,
            'metrics' => $this->metrics,
            'dimensions' => $this->dimensions,
            'orderBys' => $this->orderBys,
            'metricAggregations' => $this->metricAggregations,
        ]);

        return $this->formatResponse($response);
    }
}
