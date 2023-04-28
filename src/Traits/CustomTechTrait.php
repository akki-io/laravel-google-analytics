<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use AkkiIo\LaravelGoogleAnalytics\Period;
use Google\ApiCore\ApiException;
use Google\ApiCore\ValidationException;

trait CustomTechTrait
{
    /**
     * Get total users by platform.
     *
     * @param Period $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByPlatform(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('platform')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get total users by operating system.
     *
     * @param Period $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByOperatingSystem(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('operatingSystem')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get total users by browser.
     *
     * @param Period $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByBrowser(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('browser')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get total users by screen resolution.
     *
     * @param Period $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByScreenResolution(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('screenResolution')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get most users by platform.
     *
     * @param Period $period
     * @param int $count
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByPlatform(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('platform')
            ->orderByMetricDesc('totalUsers')
            ->limit($count)
            ->get()
            ->table;
    }

    /**
     * Get most users by operating system.
     *
     * @param Period $period
     * @param int $count
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByOperatingSystem(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('operatingSystem')
            ->orderByMetricDesc('totalUsers')
            ->limit($count)
            ->get()
            ->table;
    }

    /**
     * Get most users by browser.
     *
     * @param Period $period
     * @param int $count
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByBrowser(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('browser')
            ->orderByMetricDesc('totalUsers')
            ->limit($count)
            ->get()
            ->table;
    }

    /**
     * Get most users by screen resolution.
     *
     * @param Period $period
     * @param int $count
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByScreenResolution(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('screenResolution')
            ->orderByMetricDesc('totalUsers')
            ->limit($count)
            ->get()
            ->table;
    }

    /**
     * @throws ApiException
     * @throws ValidationException
     */
    public function getCurrentOnlineUsers()
    {
        return $this
            ->metrics('activeUsers')
            ->minuteRange(1)
            ->getRealTimeReport()
            ->table;
    }
}
