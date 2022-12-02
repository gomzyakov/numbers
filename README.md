# Numbers

[![packagist](https://img.shields.io/packagist/v/gomzyakov/numbers.svg)](https://packagist.org/packages/gomzyakov/numbers)
[![downloads_count](https://img.shields.io/packagist/dt/gomzyakov/numbers.svg)](https://packagist.org/packages/gomzyakov/numbers)
[![GitHub release](https://img.shields.io/github/release/gomzyakov/numbers.svg)](https://github.com/gomzyakov/numbers/releases/latest)
[![license](https://img.shields.io/badge/License-MIT-green.svg)](https://github.com/gomzyakov/numbers/blob/development/LICENSE)
[![codecov](https://codecov.io/gh/gomzyakov/numbers/branch/main/graph/badge.svg?token=4CYTVMVUYV)](https://codecov.io/gh/gomzyakov/numbers)

A library to validate TIN, INN, BIK and other numbers.

## Installation

Just require it in your project via [Composer](https://getcomposer.org):

```bash
composer require gomzyakov/numbers
```

## How to use

Everything is very simple. For example, you can create and verify a TIN like this::

```php
use Gomzyakov\Numbers\Numbers;
use Gomzyakov\Numbers\INN;

# TIN number
$inn_number = '2245134075';

# Create a parser
$inn = Numbers::createINN($inn_number);
# Or so
# $inn = INN::create($inn_number);
# $inn = new INN($number);

# Checking the correctness of the TIN
if ($inn->isValid()) {
    echo "INN is valid!";
}
```

Or you can use the short form of validation:

```php
use Gomzyakov\Numbers\Numbers;

$is_valid_number = Numbers::validateINN('2245134075')

echo $$is_valid_number; // true
```

## Supported numbers & countries

| Country | Numbers |
|---------|---------|
| Russia  | INN     |

[//]: # (USA TIN Central Sales Tax &#40;CST&#41;? - IndiaFilings)

## Need an unsupported number or country?

If you need a number or country is not yet supported by the `gomzyakov/numbers` package, just [open a new issue](https://github.com/gomzyakov/numbers/issues) or create a pull request to be merged.

## License

This is open-sourced software licensed under the [MIT License](https://github.com/gomzyakov/numbers/blob/main/LICENSE).
