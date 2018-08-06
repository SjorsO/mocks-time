# Mocks Time
A trait that provides a simple, fluent interface for working with `Carbon::setTestNow()`.

## Install
```bash
composer require sjorso/mocks-time --dev
```

## Why
If you are working on a project where you often time travel in your tests, then this package could make that more convenient and readable. If you don't time travel in your tests, then this package won't offer you much benefit.

The code below shows an example of how this package can be used:
```php
/** @test */
function it_gets_all_schedules_that_should_be_sent()
{
    $this->setTestNow('2018-03-28 12:00:00');

    $schedule1 = Schedule::create(['sent' => false, 'send_at' => now()]);
    $schedule2 = Schedule::create(['sent' => false, 'send_at' => now()->addMinutes(1)]);
    
    $this->assertSame([$schedule1], Schedule::shouldBeSent());
    
    $this->progressTimeInSeconds(59);
    
    $this->assertSame([$schedule1], Schedule::shouldBeSent());
    
    $this->progressTimeInSeconds(1);
    
    $this->assertSame([$schedule1, $schedule2], Schedule::shouldBeSent());    
}
```

## Usage
Use the trait in your Phpunit testcase:
```php
use MocksTime;
```

The `MocksTime` trait adds the following methods for setting the TestNow:
```php
protected function setTestNow($datetime)
protected function setTestNowTime($time)
protected function setTestNowDate($date)
protected function clearTestNow()
```

The following methods are available for progressing time:
```php
protected function progressTimeInSeconds($seconds = 1)
protected function progressTimeInMinutes($minutes = 1)
protected function progressTimeInHours($hours = 1)
protected function progressTimeInDays($days = 1)
protected function progressTimeInWeeks($weeks = 1)
protected function progressTimeInMonths($months = 1)
protected function progressTimeInYears($years = 1)
protected function progressTimeToStartOfNextWeek()
protected function progressTimeToStartOfNextMonth()
```

Every progress time method has an opposite rewind time method:
```php
protected function rewindTimeInSeconds($seconds = 1)
protected function rewindTimeInMinutes($minutes = 1)
protected function rewindTimeInHours($hours = 1)
protected function rewindTimeInDays($days = 1)
protected function rewindTimeInWeeks($weeks = 1)
protected function rewindTimeInMonths($months = 1)
protected function rewindTimeInYears($years = 1)
protected function rewindTimeToStartOfLastWeek()
protected function rewindTimeToStartOfLastMonth()
```

## License

This project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
