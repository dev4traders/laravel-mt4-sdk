# An SDK to easily work with the MT4 API in Laravel apps

This package contains the PHP SDK to work with [MT4](https://dev4traders.com/metatrader-manager-rest-api/).

Here are a few examples:

```php
use D4T\Mt4Sdk\Facades\MT4Manager;

// creating a campaign
$account = MT4Manager::createAccount([
    'email' => '1@1.com',
    'name' => 'Test Name'
]);

```

## Installation

You can install the package via composer:

```bash
composer require dev4traders/laravel-mt4-sdk
```

You must publish the config file with:

```bash
php artisan vendor:publish --tag="mt4-sdk"
```

This is the contents of the published config file:

```php
return [
    /*
     *  You'll find both the API token and endpoint on Mailcoach'
     *  API tokens screen in the Mailcoach settings.
     */
    'api_token' => env('MT4_API_TOKEN'),

    'endpoint' => env('MT4_API_ENDPOINT'),
];
```

In your `.env` file you should add the entries from the config file mentioned above.

## Usage

You can use the `D4T\MT4Sdk\Facades\MT4Manager` facade to perform most operations.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
