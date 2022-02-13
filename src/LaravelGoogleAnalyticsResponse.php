<?php

namespace AkkiIo\LaravelGoogleAnalytics;

use Google\Analytics\Data\V1beta\RunReportResponse;

class LaravelGoogleAnalyticsResponse
{
    public RunReportResponse $googleResponse;

    public array $table;

    /**
     * Set google response.
     *
     * @param RunReportResponse $googleResponse
     * @return $this
     */
    public function setGoogleResponse(RunReportResponse $googleResponse): self
    {
        $this->googleResponse = $googleResponse;

        return $this;
    }

    public function setTable(array $table):self
    {
        $this->table = $table;

        return $this;
    }
}
