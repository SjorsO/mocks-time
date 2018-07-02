<?php

namespace SjorsO\MocksTime\Tests;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use SjorsO\MocksTime\MocksTime;

class MocksTimeTest extends TestCase
{
    use MocksTime;

    /** @test */
    function it_can_set_and_clear_the_test_now()
    {
        $this->assertDoesNotHaveTestNow()
            ->setTestNow('2018-07-05 12:30:00')
            ->assertTestNow('2018-07-05 12:30:00')
            ->clearTestNow()
            ->assertDoesNotHaveTestNow();
    }

    /** @test */
    function it_can_set_the_test_now_time()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->setTestNowTime('23:59:59')
            ->assertTestNow('2018-07-05 23:59:59');
    }

    /** @test */
    function it_can_set_the_test_now_date()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->setTestNowDate('2012-01-01')
            ->assertTestNow('2012-01-01 12:30:00');
    }

    /** @test */
    function it_can_progress_time_in_seconds()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->progressTimeInSeconds(30)
            ->assertTestNow('2018-07-05 12:30:30');
    }

    /** @test */
    function it_can_rewind_time_in_seconds()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->rewindTimeInSeconds(30)
            ->assertTestNow('2018-07-05 12:29:30');
    }

    /** @test */
    function it_can_progress_time_in_minutes()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->progressTimeInMinutes(15)
            ->assertTestNow('2018-07-05 12:45:00');
    }

    /** @test */
    function it_can_rewind_time_in_minutes()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->rewindTimeInMinutes(15)
            ->assertTestNow('2018-07-05 12:15:00');
    }

    /** @test */
    function it_can_progress_time_in_hours()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->progressTimeInHours(2)
            ->assertTestNow('2018-07-05 14:30:00');
    }

    /** @test */
    function it_can_rewind_time_in_hours()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->rewindTimeInHours(2)
            ->assertTestNow('2018-07-05 10:30:00');
    }

    /** @test */
    function it_can_progress_time_in_days()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->progressTimeInDays(2)
            ->assertTestNow('2018-07-07 12:30:00');
    }

    /** @test */
    function it_can_rewind_time_in_days()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->rewindTimeInDays(2)
            ->assertTestNow('2018-07-03 12:30:00');
    }

    /** @test */
    function it_can_progress_time_in_weeks()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->progressTimeInWeeks(2)
            ->assertTestNow('2018-07-19 12:30:00');
    }

    /** @test */
    function it_can_rewind_time_in_weeks()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->rewindTimeInWeeks(2)
            ->assertTestNow('2018-06-21 12:30:00');
    }

    /** @test */
    function it_can_progress_time_in_months()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->progressTimeInMonths(2)
            ->assertTestNow('2018-09-05 12:30:00');
    }

    /** @test */
    function it_can_rewind_time_in_months()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->rewindTimeInMonths(2)
            ->assertTestNow('2018-05-05 12:30:00');
    }

    /** @test */
    function it_can_progress_time_in_years()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->progressTimeInYears(2)
            ->assertTestNow('2020-07-05 12:30:00');
    }

    /** @test */
    function it_can_rewind_time_in_years()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->rewindTimeInYears(2)
            ->assertTestNow('2016-07-05 12:30:00');
    }

    /** @test */
    function it_can_progress_time_to_the_start_of_next_month()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->progressTimeToStartOfNextMonth()
            ->assertTestNow('2018-08-01 00:00:00');
    }

    /** @test */
    function it_can_rewind_time_to_the_start_of_last_month()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->rewindTimeToStartOfLastMonth()
            ->assertTestNow('2018-06-01 00:00:00');
    }

    /** @test */
    function it_can_progress_time_to_the_start_of_next_week()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->progressTimeToStartOfNextWeek()
            ->assertTestNow('2018-07-09 00:00:00');
    }

    /** @test */
    function it_can_rewind_time_to_the_start_of_last_week()
    {
        $this->setTestNow('2018-07-05 12:30:00')
            ->rewindTimeToStartOfLastWeek()
            ->assertTestNow('2018-06-25 00:00:00');
    }

    private function assertHasTestNow()
    {
        $this->assertTrue(
            Carbon::hasTestNow()
        );

        return $this;
    }

    private function assertDoesNotHaveTestNow()
    {
        $this->assertFalse(
            Carbon::hasTestNow()
        );

        return $this;
    }

    private function assertTestNow($datetime)
    {
        $this->assertHasTestNow();

        $this->assertSame(
            $datetime,
            Carbon::now()->toDateTimeString()
        );

        return $this;
    }
}
