<?php

namespace AkkiIo\LaravelGoogleAnalytics\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static __construct()
 * @method static self propertyId( $propertyId = NULL)
 * @method static \AkkiIo\LaravelGoogleAnalytics\LaravelGoogleAnalyticsResponse get()
 * @method static self dateRange(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static self dateRanges(\AkkiIo\LaravelGoogleAnalytics\Period ...$items)
 * @method static self metric(string $name)
 * @method static self metrics(string ...$items)
 * @method static self dimension(string $name)
 * @method static self dimensions(string ...$items)
 * @method static self orderByMetric(string $name, string $order = 'ASC')
 * @method static self orderByMetricDesc(string $name)
 * @method static \AkkiIo\LaravelGoogleAnalytics\LaravelGoogleAnalyticsResponse formatResponse(\Google\Analytics\Data\V1beta\RunReportResponse $response)
 * @method static array getTable(\Google\Analytics\Data\V1beta\RunReportResponse $response)
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
