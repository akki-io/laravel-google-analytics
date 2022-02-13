<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use AkkiIo\LaravelGoogleAnalytics\LaravelGoogleAnalyticsResponse;
use Google\Analytics\Data\V1beta\RunReportResponse;

trait ResponseTrait
{
    /**
     * Parse the output.
     *
     * @param RunReportResponse $response
     * @return LaravelGoogleAnalyticsResponse
     */
    private function formatResponse(RunReportResponse $response): LaravelGoogleAnalyticsResponse
    {
        return (new LaravelGoogleAnalyticsResponse())
            ->setGoogleResponse($response)
            ->setTable($this->getTable($response));
    }

    /**
     * Get table collection.
     *
     * @param RunReportResponse $response
     * @return array
     */
    private function getTable(RunReportResponse $response): array
    {
        $metricHeaders = [];
        $dimensionHeaders = [];
        $output = [];

        foreach ($response->getDimensionHeaders() as $header) {
            $dimensionHeaders[] = $header->getName();
        }

        foreach ($response->getMetricHeaders() as $header) {
            $metricHeaders[] = $header->getName();
        }

        foreach ($response->getRows() as $row) {
            $tableArray = [];
            foreach ($row->getDimensionValues() as $key => $item) {
                $tableArray[$dimensionHeaders[$key]] = $item->getValue();
            }
            foreach ($row->getMetricValues() as $key => $item) {
                $tableArray[$metricHeaders[$key]] = $item->getValue();
            }

            $output[] = $tableArray;
        }

        return $output;
    }
}
