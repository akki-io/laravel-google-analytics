<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use AkkiIo\LaravelGoogleAnalytics\LaravelGoogleAnalyticsResponse;
use Google\Analytics\Data\V1beta\RunReportResponse;

trait ResponseTrait
{
    public array $metricHeaders = [];
    public array $dimensionHeaders = [];

    /**
     * Parse the output.
     *
     * @param RunReportResponse $response
     * @return LaravelGoogleAnalyticsResponse
     */
    private function formatResponse(RunReportResponse $response): LaravelGoogleAnalyticsResponse
    {
        $this->setDimensionAndMetricHeaders($response);

        return (new LaravelGoogleAnalyticsResponse())
            ->setGoogleResponse($response)
            ->setTable($this->getTable($response))
            ->setMetricAggregationsTable($this->getMetricAggregationsTable($response));
    }

    /**
     * Get the metric aggregations table.
     *
     * @param RunReportResponse $response
     * @return array
     */
    private function getMetricAggregationsTable(RunReportResponse $response): array
    {
        $output = [];

        $aggregationMethods = [
            'getTotals',
            'getMaximums',
            'getMinimums',
        ];

        foreach ($aggregationMethods as $aggregationMethod) {
            foreach ($response->{$aggregationMethod}() as $row) {
                if ($row->getMetricValues()->count()) {
                    $tableArray = [];
                    foreach ($row->getDimensionValues() as $key => $item) {
                        $tableArray[$key === 0 ? 'aggregation' : $this->dimensionHeaders[$key]] = $item->getValue();
                    }
                    foreach ($row->getMetricValues() as $key => $item) {
                        $tableArray[$this->metricHeaders[$key]] = $item->getValue();
                    }
                    $output[] = $tableArray;
                }
            }
        }

        return $output;
    }

    /**
     * Get table collection.
     *
     * @param RunReportResponse $response
     * @return array
     */
    private function getTable(RunReportResponse $response): array
    {
        $output = [];

        foreach ($response->getRows() as $row) {
            $tableArray = [];
            foreach ($row->getDimensionValues() as $key => $item) {
                $tableArray[$this->dimensionHeaders[$key]] = $item->getValue();
            }
            foreach ($row->getMetricValues() as $key => $item) {
                $tableArray[$this->metricHeaders[$key]] = $item->getValue();
            }
            $output[] = $tableArray;
        }

        return $output;
    }

    /**
     * Set dimension and metric headers.
     *
     * @param RunReportResponse $response
     * @return void
     */
    private function setDimensionAndMetricHeaders(RunReportResponse $response)
    {
        foreach ($response->getDimensionHeaders() as $header) {
            $this->dimensionHeaders[] = $header->getName();
        }

        foreach ($response->getMetricHeaders() as $header) {
            $this->metricHeaders[] = $header->getName();
        }
    }
}
