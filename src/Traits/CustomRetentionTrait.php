<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use AkkiIo\LaravelGoogleAnalytics\Period;

trait CustomRetentionTrait
{
    /**
     * Get total new and returning users.
     *
     * @param Period $period
     * @return array
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalNewAndReturningUsers(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('newVsReturning')
            ->get()
            ->table;
    }

    /**
     * Get total new and returning users by date.
     *
     * @param Period $period
     * @return array
     * @throws \Google\ApiCore\ApiException
     * @throws \Google\ApiCore\ValidationException
     */
    public function getTotalNewAndReturningUsersByDate(Period $period): array
    {
        return $this->dateRange($period)
            ->metrics('totalUsers')
            ->dimensions('newVsReturning', 'date')
            ->orderByDimension('date')
            ->keepEmptyRows(true)
            ->get()
            ->table;
    }
}
