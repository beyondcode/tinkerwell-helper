# Tinkerwell Helper

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
