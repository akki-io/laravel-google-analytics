<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use AkkiIo\LaravelGoogleAnalytics\Period;

trait CustomTechTrait
{
    /**
     * Get users by platform.
     *
     * @param Period $period
     * @return array
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getUserByPlatform(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('platform')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get users by operating system.
     *
     * @param Period $period
     * @return array
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getUserByOperatingSystem(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('operatingSystem')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get users by browser.
     *
     * @param Period $period
     * @return array
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getUserByBrowser(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('browser')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get users by screen resolution.
     *
     * @param Period $period
     * @return array
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getUserByScreenResolution(Period $period): array
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
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUserByPlatform(Period $period, int $count = 20): array
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
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUserByOperatingSystem(Period $period, int $count = 20): array
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
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUserByBrowser(Period $period, int $count = 20): array
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
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUserByScreenResolution(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('screenResolution')
            ->orderByMetricDesc('totalUsers')
            ->limit($count)
            ->get()
            ->table;
    }
}
