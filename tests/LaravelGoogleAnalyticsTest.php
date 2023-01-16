<?php

namespace AkkiIo\LaravelGoogleAnalytics\Tests;

use AkkiIo\LaravelGoogleAnalytics\Facades\LaravelGoogleAnalytics;
use AkkiIo\LaravelGoogleAnalytics\Period;
use Google\Analytics\Data\V1beta\Filter\NumericFilter\Operation;
use Google\Analytics\Data\V1beta\Filter\StringFilter\MatchType;
use Google\Analytics\Data\V1beta\MetricAggregation;
use Illuminate\Support\Carbon;

class LaravelGoogleAnalyticsTest extends TestCase
{
    public $analytics;

    protected function setUp(): void
    {
        parent::setUp();

        $dateOne = Carbon::parse('2021-01-01');
        $dateTwo = Carbon::parse('2021-01-04');
        $dateThree = Carbon::parse('2021-01-06');

        $this->analytics = LaravelGoogleAnalytics::dateRanges(Period::create($dateOne, $dateOne), Period::create($dateTwo, $dateTwo))
            ->dateRange(Period::create($dateThree, $dateThree))
            ->metrics('active1DayUsers', 'active7DayUsers')
            ->metric('active28DayUsers')
            ->dimensions('day', 'dayOfWeek')
            ->dimension('browser')
            ->metricAggregations(MetricAggregation::MINIMUM, MetricAggregation::MAXIMUM)
            ->metricAggregation(MetricAggregation::TOTAL);
    }

    /** @test */
    public function it_should_return_correct_count()
    {
        $result = $this->analytics->get();

        $this->assertCount(63, $result->table);
        $this->assertCount(9, $result->metricAggregationsTable);
    }

    /** @test */
    public function it_should_filter_dimension_result()
    {
        $result = $this->analytics
            ->whereDimension('browser', MatchType::CONTAINS, 'firefox')
            ->get();

        $this->assertCount(9, $result->table);
    }

    /** @test */
    public function it_should_filter_dimension_list_result()
    {
        $result = $this->analytics
            ->whereDimensionIn('browser', ['firefox', 'chrome'])
            ->get();

        $this->assertCount(18, $result->table);
    }

    /** @test */
    public function it_should_filter_metric_result()
    {
        $result = $this->analytics
            ->whereMetric('active28DayUsers', Operation::EQUAL, '474')
            ->get();

        $this->assertCount(1, $result->table);
    }

    /** @test */
    public function it_should_filter_metric_between_result()
    {
        $result = $this->analytics
            ->whereMetricBetween('active28DayUsers', 400, 500)
            ->get();

        $this->assertCount(9, $result->table);
    }

    /** @test */
    public function it_should_work_with_limit_and_offset()
    {
        $result = $this->analytics
            ->limit(5)
            ->offset(20)
            ->get();

        $this->assertCount(3, $result->table);
    }

    /** @test */
    public function it_should_filter_dimension_with_and_group()
    {
        $result = $this->analytics
            ->whereAndGroupDimensions([
                ['browser', MatchType::CONTAINS, 'firefox'],
                ['browser', MatchType::CONTAINS, 'chrome']
            ])
            ->get();

        $this->assertCount(0, $result->table);
    }

    /** @test */
    public function it_should_filter_dimension_with_or_group()
    {
        $result = $this->analytics
            ->whereOrGroupDimensions([
                ['browser', MatchType::CONTAINS, 'firefox'],
                ['browser', MatchType::CONTAINS, 'chrome']
            ])
            ->get();

        $this->assertCount(18, $result->table);
    }
}
