# PayChangu Mobile PHP Client

A PHP package for interacting with the PayChangu Mobile API.

## Usage

```php
use Alluvamz\PayChanguMobile\PayChanguIntegration;
use Alluvamz\PayChanguMobile\Data\Request\ChargeMobileRequestData;

$payChangu = new PayChanguIntegration('YOUR_PRIVATE_KEY');

// Make a direct charge
$chargeData = new ChargeMobileRequestData(
    chargeId: 'YOUR_CHARGE_ID',
    mobile: 'CUSTOMER_MOBILE_NUMBER',
    amount: 'AMOUNT',
    mobileMoneyOperatorRefId: 'OPERATOR_REF_ID'
);

$response = $payChangu->makeDirectCharge($chargeData);
```

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
