<?php

namespace AkkiIo\LaravelGoogleAnalytics;

use Google\Analytics\Data\V1beta\RunRealtimeReportResponse;
use Google\Analytics\Data\V1beta\RunReportResponse;

class LaravelGoogleAnalyticsResponse
{
    public RunReportResponse|RunRealtimeReportResponse $googleResponse;

    public array $table;

    public array $metricAggregationsTable;

    /**
     * Set google response.
     *
     * @param RunReportResponse|RunRealtimeReportResponse $googleResponse
     * @return $this
     */
    public function setGoogleResponse(RunReportResponse|RunRealtimeReportResponse $googleResponse): self
    {
        $this->googleResponse = $googleResponse;

        return $this;
    }

    /**
     * Set the output as a table array.
     *
     * @param  array  $table
     * @return $this
     */
    public function setTable(array $table): self
    {
        $this->table = $table;

        return $this;
    }

    /**
     * Set the metric aggregations output as a table array.
     *
     * @param  array  $metricAggregationsTable
     * @return $this
     */
    public function setMetricAggregationsTable(array $metricAggregationsTable): self
    {
        $this->metricAggregationsTable = $metricAggregationsTable;

        return $this;
    }
}
