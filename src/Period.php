<?php

namespace AkkiIo\LaravelGoogleAnalytics;

use AkkiIo\LaravelGoogleAnalytics\Exceptions\InvalidPeriod;
use Illuminate\Support\Carbon;

class Period
{
    public Carbon $startDate;
    public Carbon $endDate;

    /**
     * Period construct.
     *
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @throws InvalidPeriod
     */
    public function __construct(Carbon $startDate, Carbon $endDate)
    {
        if ($startDate > $endDate) {
            throw InvalidPeriod::startDateCannotBeAfterEndDate($startDate, $endDate);
        }
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    /**
     * Create a period.
     *
     * @param Carbon $startDate
     * @param Carbon $endDate
     * @return static
     * @throws InvalidPeriod
     */
    public static function create(Carbon $startDate, Carbon $endDate): self
    {
        return new static($startDate, $endDate);
    }

    /**
     * Create a period using days.
     *
     * @param int $numberOfDays
     * @return static
     * @throws InvalidPeriod
     */
    public static function days(int $numberOfDays): Period
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays($numberOfDays)->startOfDay();
        return new static($startDate, $endDate);
    }

    /**
     * Create a period using months.
     *
     * @param int $numberOfMonths
     * @return static
     * @throws InvalidPeriod
     */
    public static function months(int $numberOfMonths): Period
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subMonths($numberOfMonths)->startOfDay();
        return new static($startDate, $endDate);
    }

    /**
     * Create a period using years.
     *
     * @param int $numberOfYears
     * @return static
     * @throws InvalidPeriod
     */
    public static function years(int $numberOfYears): Period
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subYears($numberOfYears)->startOfDay();
        return new static($startDate, $endDate);
    }
}
