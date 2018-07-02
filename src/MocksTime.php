<?php

namespace SjorsO\MocksTime;

use Carbon\Carbon;

trait MocksTime
{
    protected function setTestNow($datetime)
    {
        Carbon::setTestNow($datetime);

        return $this;
    }

    protected function setTestNowTime($time)
    {
        return $this->setTestNow(
            Carbon::now()->format('Y-m-d ').$time
        );
    }

    protected function setTestNowDate($date)
    {
        return $this->setTestNow(
            $date.Carbon::now()->format(' H:i:s')
        );
    }

    protected function clearTestNow()
    {
        return $this->setTestNow(null);
    }

    protected function progressTimeInSeconds($seconds = 1)
    {
        return $this->setTestNow(
            Carbon::now()->addSeconds($seconds)
        );
    }

    protected function rewindTimeInSeconds($seconds = 1)
    {
        return $this->progressTimeInSeconds(-$seconds);
    }

    protected function progressTimeInMinutes($minutes = 1)
    {
        return $this->setTestNow(
            Carbon::now()->addMinutes($minutes)
        );
    }

    protected function rewindTimeInMinutes($minutes = 1)
    {
        return $this->progressTimeInMinutes(-$minutes);
    }

    protected function progressTimeInHours($hours = 1)
    {
        return $this->setTestNow(
            Carbon::now()->addHours($hours)
        );
    }

    protected function rewindTimeInHours($hours = 1)
    {
        return $this->progressTimeInHours(-$hours);
    }

    protected function progressTimeInDays($days = 1)
    {
        return $this->setTestNow(
            Carbon::now()->addDays($days)
        );
    }

    protected function rewindTimeInDays($days = 1)
    {
        return $this->progressTimeInDays(-$days);
    }

    protected function progressTimeInWeeks($weeks = 1)
    {
        return $this->setTestNow(
            Carbon::now()->addWeeks($weeks)
        );
    }

    protected function rewindTimeInWeeks($weeks = 1)
    {
        return $this->progressTimeInWeeks(-$weeks);
    }

    protected function progressTimeInMonths($months = 1)
    {
        return $this->setTestNow(
            Carbon::now()->addMonths($months)
        );
    }

    protected function rewindTimeInMonths($months = 1)
    {
        return $this->progressTimeInMonths(-$months);
    }

    protected function progressTimeInYears($years = 1)
    {
        return $this->setTestNow(
            Carbon::now()->addYears($years)
        );
    }

    protected function rewindTimeInYears($years = 1)
    {
        return $this->progressTimeInYears(-$years);
    }

    protected function progressTimeToStartOfNextWeek()
    {
        return $this->setTestNow(
            Carbon::now()->addWeek()->startOfWeek()
        );
    }

    protected function rewindTimeToStartOfLastWeek()
    {
        return $this->setTestNow(
            Carbon::now()->subWeek()->startOfWeek()
        );
    }

    protected function progressTimeToStartOfNextMonth()
    {
        return $this->setTestNow(
            Carbon::now()->addMonth()->startOfMonth()
        );
    }

    protected function rewindTimeToStartOfLastMonth()
    {
        return $this->setTestNow(
            Carbon::now()->subMonth()->startOfMonth()
        );
    }
}
