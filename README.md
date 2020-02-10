# Tinkerwell Helper
 
Open Tinkerwell right from your Laravel apps.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/beyondcode/tinkerwell-helper.svg?style=flat-square)](https://packagist.org/packages/beyondcode/tinkerwell-helper)
[![Build Status](https://img.shields.io/travis/beyondcode/tinkerwell-helper/master.svg?style=flat-square)](https://travis-ci.org/beyondcode/tinkerwell-helper)
[![Quality Score](https://img.shields.io/scrutinizer/g/beyondcode/tinkerwell-helper.svg?style=flat-square)](https://scrutinizer-ci.com/g/beyondcode/tinkerwell-helper)
[![Total Downloads](https://img.shields.io/packagist/dt/beyondcode/tinkerwell-helper.svg?style=flat-square)](https://packagist.org/packages/beyondcode/tinkerwell-helper)

Immediately open Tinkerwell from within your Laravel applications. Think of it as a `dd` on steroids.

## Installation

You can install the package via composer:

```bash
composer require beyondcode/tinkerwell-helper
```

## Usage

Use the `tinker` method to open Tinkerwell with the given variables available in the Tinkerwell scope.

For example:
``` php
$user = User::find(1);

tinker($user);
```

This will open Tinkerwell and you will have the `$user` variable available within Tinkerwell immediately.

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email marcel@beyondco.de instead of using the issue tracker.

## Credits

- [Marcel Pociot](https://github.com/mpociot)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
