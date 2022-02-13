<?php

namespace AkkiIo\LaravelGoogleAnalytics\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static self setPropertyId( $propertyId = NULL)
 * @method static self setCredentials( $credentials = NULL)
 * @method static \AkkiIo\LaravelGoogleAnalytics\LaravelGoogleAnalyticsResponse get()
 * @method static self dateRange(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static self dateRanges(\AkkiIo\LaravelGoogleAnalytics\Period ...$items)
 * @method static self metric(string $name)
 * @method static self metrics(string ...$items)
 * @method static self dimension(string $name)
 * @method static self dimensions(string ...$items)
 * @method static self orderByMetric(string $name, string $order = 'ASC')
 * @method static self orderByMetricDesc(string $name)
 * @method static self orderByDimension(string $name, string $order = 'ASC')
 * @method static self orderByDimensionDesc(string $name)
 * @method static self metricAggregation(int $value)
 * @method static self metricAggregations(int ...$items)
 * @method static self whereDimension(string $name, int $matchType,  $value, bool $caseSensitive = false)
 * @method static self whereDimensionIn(string $name, array $values, bool $caseSensitive = false)
 * @method static self whereMetric(string $name, int $operation,  $value)
 * @method static self whereMetricBetween(string $name,  $from,  $to)
 * @method static \Google\Analytics\Data\V1beta\NumericValue getNumericObject( $value)
 * @method static self keepEmptyRows(bool $keepEmptyRows = false)
 * @method static self limit(?int $limit = NULL)
 * @method static self offset(?int $offset = NULL)
 * @method static \AkkiIo\LaravelGoogleAnalytics\LaravelGoogleAnalyticsResponse formatResponse(\Google\Analytics\Data\V1beta\RunReportResponse $response)
 * @method static array getMetricAggregationsTable(\Google\Analytics\Data\V1beta\RunReportResponse $response)
 * @method static array getTable(\Google\Analytics\Data\V1beta\RunReportResponse $response)
 * @method static setDimensionAndMetricHeaders(\Google\Analytics\Data\V1beta\RunReportResponse $response)
 */
class LaravelGoogleAnalytics extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-google-analytics';
    }
}
