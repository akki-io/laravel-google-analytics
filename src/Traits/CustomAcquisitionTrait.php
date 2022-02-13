<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use AkkiIo\LaravelGoogleAnalytics\Period;
use Illuminate\Support\Arr;

trait CustomAcquisitionTrait
{
    /**
     * Get total users.
     *
     * @param Period $period
     * @return int
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsers(Period $period): int
    {
        $result = $this->dateRange($period)
            ->metrics('totalUsers')
            ->get()
            ->table;

        return (int) Arr::first(Arr::flatten($result));
    }

    /**
     * Get total users by date.
     *
     * @param Period $period
     * @return array
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByDate(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('date')
            ->orderByDimension('date')
            ->keepEmptyRows(true)
            ->get()
            ->table;
    }

    /**
     * Get total users by session source.
     *
     * @param Period $period
     * @return array
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersBySessionSource(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('sessionSource')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get total users by date.
     *
     * @param Period $period
     * @param int $count
     * @return array
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByDate(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('date')
            ->orderByMetricDesc('totalUsers')
            ->limit($count)
            ->get()
            ->table;
    }

    /**
     * Get total users by session source.
     *
     * @param Period $period
     * @param int $count
     * @return array
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersBySessionSource(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('sessionSource')
            ->orderByMetricDesc('totalUsers')
            ->limit($count)
            ->get()
            ->table;
    }
}
