# PayChangu PHP Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/enonj/paychangu.svg?style=flat-square)](https://packagist.org/packages/enonj/paychangu)
[![Total Downloads](https://img.shields.io/packagist/dt/enonj/paychangu.svg?style=flat-square)](https://packagist.org/packages/enonj/paychangu)

A PHP package for interacting with the PayChangu API.

## Installation

You can install the package via composer:

```bash
composer require enonj/paychangu
```

## Usage

```php
use Alluvamz\PayChanguMobile\PayChanguIntegration;
use Alluvamz\PayChanguMobile\Data\Request\ChargeMobileRequestData;

$payChangu = new PayChanguIntegration('YOUR_PUBLIC_KEY', 'YOUR_PRIVATE_KEY');

// Get mobile operators
$operators = $payChangu->getMobileOperators();

// Make a direct charge
$chargeData = new ChargeMobileRequestData(
    chargeId: 'YOUR_CHARGE_ID',
    mobile: 'CUSTOMER_MOBILE_NUMBER',
    amount: 'AMOUNT',
    mobileMoneyOperatorRefId: 'OPERATOR_REF_ID'
);

$response = $payChangu->makeDirectCharge($chargeData);
```

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email your@email.com instead of using the issue tracker.

## Credits

- [Your Name](https://github.com/your-username)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
