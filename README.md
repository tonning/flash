# Flash for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tonning/flash.svg?style=flat-square)](https://packagist.org/packages/tonning/flash)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/tonning/flash/run-tests?label=tests)](https://github.com/tonning/flash/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/tonning/flash/Check%20&%20fix%20styling?label=code%20style)](https://github.com/tonning/flash/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tonning/flash.svg?style=flat-square)](https://packagist.org/packages/tonning/flash)

This composer package offers a Tailwind optimized flash messaging setup for your Laravel applications.

## Installation

You can install the package via composer:

```bash
composer require tonning/flash
```

You can publish the view files with:

```bash
php artisan vendor:publish --provider="Tonning\Flash\FlashServiceProvider" --tag="flash-views"
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Tonning\Flash\FlashServiceProvider" --tag="flash-config"
```

This is the contents of the published config file:

```php
return [
    'display_errors' => true,
];
```

## Usage

Anywhere in your application you can added a flash notification.

```php
use Tonning\Flash\Flash;

Flash::info('A new software update is available. See what’s new in version 2.0.4.');
```

### Displaying notifications

```php
@if(flash()->hasAny())
    {!! flash() !!}
@endif
```

### Titles
You can also provide a title to your notifications that will be displayed along with it.

```php
use Tonning\Flash\Flash;

Flash::warning('Please confirm your email address.', 'Attention needed');
```

### Grouping
Notifications of the same type will be grouped in an unordered list.

```php
use Tonning\Flash\Flash;

Flash::warning('Facilisis himenaeos nullam habitasse lacus sem auctor.');
Flash::warning('Please confirm your email address.', 'Attention needed');
Flash::warning('Facilisis egestas fermentum porttitor sapien eleifend amet.');
```

### Errors
This package will by default also display any validation errors.

```php
throw ValidationException::withMessages(['Something went wrong.']);
```

This can be turned of in the config file.

```php
'display_errors' => false,
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Kristoffer Tonning](https://github.com/tonning)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
