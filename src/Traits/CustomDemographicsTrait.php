<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use AkkiIo\LaravelGoogleAnalytics\Period;

trait CustomDemographicsTrait
{
    /**
     * Get total users by country.
     *
     * @param  Period  $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByCountry(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('country', 'countryId')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get total users by city.
     *
     * @param  Period  $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByCity(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('city', 'cityId')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get total users by gender.
     *
     * @param  Period  $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByGender(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('userGender')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get total users by language.
     *
     * @param  Period  $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByLanguage(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('language')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get total users by age.
     *
     * @param  Period  $period
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalUsersByAge(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('userAgeBracket')
            ->orderByMetricDesc('totalUsers')
            ->get()
            ->table;
    }

    /**
     * Get most users by country.
     *
     * @param  Period  $period
     * @param  int  $count
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByCountry(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('country', 'countryId')
            ->orderByMetricDesc('totalUsers')
            ->limit($count)
            ->get()
            ->table;
    }

    /**
     * Get most users by city.
     *
     * @param  Period  $period
     * @param  int  $count
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByCity(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('city', 'cityId')
            ->orderByMetricDesc('totalUsers')
            ->limit($count)
            ->get()
            ->table;
    }

    /**
     * Get most users by language.
     *
     * @param  Period  $period
     * @param  int  $count
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByLanguage(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('language')
            ->orderByMetricDesc('totalUsers')
            ->limit($count)
            ->get()
            ->table;
    }

    /**
     * Get most users by age.
     *
     * @param  Period  $period
     * @param  int  $count
     * @return array
     *
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getMostUsersByAge(Period $period, int $count = 20): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('userAgeBracket')
            ->orderByMetricDesc('totalUsers')
            ->limit($count)
            ->get()
            ->table;
    }
}
