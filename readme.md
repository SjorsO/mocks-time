# Mocks Time
A trait that provides a simple, fluent interface for working with `Carbon::setTestNow()`.

## Install
```bash
composer require sjorso/mocks-time --dev
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
