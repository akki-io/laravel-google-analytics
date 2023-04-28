<?php

namespace AkkiIo\LaravelGoogleAnalytics\Traits;

use Google\Analytics\Data\V1beta\MinuteRange;

trait MinuteRangeTrait
{
    public array $minuteRanges = [];

    public function minuteRange(int $start, int $end = 0): self
    {
        $this->minuteRanges[] = (new MinuteRange())->setName(
            $start.'-'.$end.'-minutes-ago')
            ->setStartMinutesAgo($start)
            ->setEndMinutesAgo($end);

        return $this;
    }
}
