<p align="center">
    <img src="https://raw.githubusercontent.com/akki-io/laravel-google-analytics/master/images/hero.png" alt="Hero" width="600">
</p>

# Laravel Google Analytics

[![Latest Version](https://img.shields.io/github/release/akki-io/laravel-google-analytics.svg?style=flat-square)](https://github.com/akki-io/laravel-google-analytics/releases)
![GitHub Workflow Status (branch)](https://img.shields.io/github/actions/workflow/status/akki-io/laravel-google-analytics/test.yml?branch=master&style=flat-square)
[![StyleCI](https://styleci.io/repos/441735142/shield?branch=master)](https://styleci.io/repos/441735142)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/akki-io/laravel-google-analytics.svg?style=flat-square)](https://packagist.org/packages/akki-io/laravel-google-analytics)


A Laravel package to retrieve data from Google Analytics 4 using the GA4 Query Explorer

## TL;DR

Using this package you can easily retrieve data from Google Analytics 4.

Below are some examples.

```php

use AkkiIo\LaravelGoogleAnalytics\Facades\LaravelGoogleAnalytics;
use AkkiIo\LaravelGoogleAnalytics\Period;
use Google\Analytics\Data\V1beta\Filter\StringFilter\MatchType;
use Google\Analytics\Data\V1beta\MetricAggregation;
use Google\Analytics\Data\V1beta\Filter\NumericFilter\Operation;

// get the top 20 most viewed pages for last 30 days
LaravelGoogleAnalytics::getMostViewsByPage(Period::days(30), $count = 20);

// get the top 20 dates with most users for last 12 months
LaravelGoogleAnalytics::getMostUsersByDate(Period::months(12), $count = 20);

// build a query using the `get()` method
LaravelGoogleAnalytics::dateRanges(Period::days(30), Period::days(60))
    ->metrics('active1DayUsers', 'active7DayUsers')
    ->dimensions('browser', 'language')
    ->metricAggregations(MetricAggregation::TOTAL, MetricAggregation::MINIMUM)
    ->whereDimension('browser', MatchType::CONTAINS, 'firefox')
    ->whereMetric('active7DayUsers', Operation::GREATER_THAN, 50)
    ->orderByDimensionDesc('language')
    ->get();
```


Please refer to the [wiki](https://github.com/akki-io/laravel-google-analytics/wiki) for more details.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hello@akki.io instead of using the issue tracker.

## Credits

- [Akki Khare](https://github.com/akki-io)
- [All Contributors](../../contributors)
- [spatie/laravel-analytics](https://github.com/spatie/laravel-analytics)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
