<?php

namespace AkkiIo\LaravelGoogleAnalytics\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static self setPropertyId( $propertyId = NULL)
 * @method static ?int getPropertyId()
 * @method static self setCredentials( $credentials = NULL)
 * @method static getCredentials()
 * @method static \Google\Analytics\Data\V1beta\BetaAnalyticsDataClient getClient()
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
 * @method static int getTotalUsers(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getTotalUsersByDate(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getTotalUsersBySessionSource(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getMostUsersByDate(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
 * @method static array getMostUsersBySessionSource(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
 * @method static float getAverageSessionDuration(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getAverageSessionDurationByDate(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static int getTotalViews(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getTotalViewsByDate(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getTotalViewsByPage(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getTotalViewsByPageAndUser(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getMostViewsByPage(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
 * @method static array getMostViewsByUser(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
 * @method static array getTotalNewAndReturningUsers(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getTotalNewAndReturningUsersByDate(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getUsersByCountry(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getUsersByCity(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getUsersByGender(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getUsersByLanguage(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getUsersByAge(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getMostUsersByCountry(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
 * @method static array getMostUsersByCity(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
 * @method static array getMostUsersByLanguage(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
 * @method static array getMostUsersByAge(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
 * @method static array getUserByPlatform(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getUserByOperatingSystem(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getUserByBrowser(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getUserByScreenResolution(\AkkiIo\LaravelGoogleAnalytics\Period $period)
 * @method static array getMostUserByPlatform(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
 * @method static array getMostUserByOperatingSystem(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
 * @method static array getMostUserByBrowser(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
 * @method static array getMostUserByScreenResolution(\AkkiIo\LaravelGoogleAnalytics\Period $period, int $count = 20)
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
