<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use AkkiIo\LaravelGoogleAnalytics\Period;
use Illuminate\Support\Arr;

trait CustomEngagementTrait
{
    /**
     * Get average session durations in seconds.
     *
     * @param  Period  $period
     * @return float
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getAverageSessionDuration(Period $period): float
    {
        $result = $this->dateRange($period)
            ->metrics('averageSessionDuration')
            ->get()
            ->table;

        return (float) Arr::first(Arr::flatten($result));
    }

    /**
     * Get average session durations in seconds by date.
     *
     * @param  Period  $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getAverageSessionDurationByDate(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('averageSessionDuration')
            ->dimensions('date')
            ->orderByDimension('date')
            ->keepEmptyRows(true)
            ->get()
            ->table;
    }

    /**
     * Get total views.
     *
     * @param  Period  $period
     * @return int
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalViews(Period $period): int
    {
        $result = $this->dateRange($period)
            ->metrics('screenPageViews')
            ->get()
            ->table;

        return (int) Arr::first(Arr::flatten($result));
    }

    /**
     * Get total views by date.
     *
     * @param  Period  $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalViewsByDate(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('screenPageViews')
            ->dimensions('date')
            ->orderByDimension('date')
            ->keepEmptyRows(true)
            ->get()
            ->table;
    }

    /**
     * Get total views by page.
     *
     * @param  Period  $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalViewsByPage(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('screenPageViews')
            ->dimensions('pageTitle', 'fullPageUrl')
            ->get()
            ->table;
    }

    /**
     * Get total views by page and user.
     *
     * @param  Period  $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalViewsByPageAndUser(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('screenPageViews', 'totalUsers')
            ->dimensions('pageTitle', 'fullPageUrl')
            ->get()
            ->table;
    }

    /**
     * Get most views by page.
     *
     * @param  Period  $period
     * @param  int  $count
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostViewsByPage(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('screenPageViews')
            ->dimensions('pageTitle', 'fullPageUrl')
            ->orderByMetricDesc('screenPageViews')
            ->limit($count)
            ->get()
            ->table;
    }
}
