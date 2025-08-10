# PayChangu Mobile PHP Client

A PHP package for interacting with the PayChangu Mobile API.

## Usage

see [Paychangu Charge Request](https://developer.paychangu.com/reference/charge-mobile-money)

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

## Fetching Mobile Operators

This will fetch mobile operators supported by paychangu (TNM,AIRTEL...)
see [PayChangu Mobile Money Operators](https://developer.paychangu.com/reference/supported-momo-operators)

```php
use Alluvamz\PayChanguMobile\PayChanguIntegration;
use Alluvamz\PayChanguMobile\Data\Request\ChargeMobileRequestData;

$payChangu = new PayChanguIntegration('YOUR_PRIVATE_KEY');

$repository = new MobileOperatorRepository($payChangu);

$repository->all()
```

## How To Get Operate Ref Id

see [PayChangu Mobile Money Operators](https://developer.paychangu.com/reference/supported-momo-operators)

```php
use Alluvamz\PayChanguMobile\PayChanguIntegration;
use Alluvamz\PayChanguMobile\Data\Request\ChargeMobileRequestData;

$payChangu = new PayChanguIntegration('YOUR_PRIVATE_KEY');

$repository = new MobileOperatorRepository($payChangu);

$repository->findByShortCode('tnm')->refId
```

## How To Check Charge Details

see [Paychangu Single Charge details](https://developer.paychangu.com/reference/single-charge-details)

```php
use Alluvamz\PayChanguMobile\PayChanguIntegration;
use Alluvamz\PayChanguMobile\Data\Request\ChargeMobileRequestData;

$payChangu = new PayChanguIntegration('YOUR_PRIVATE_KEY');

$payChangu->getDirectChargeDetails('YOUR_CHARGE_ID')
```

## How To Verify Direct Charge Status

see [Paychangu Verify Direct Charge Status](https://developer.paychangu.com/reference/verify-direct-charge-status)

```php
use Alluvamz\PayChanguMobile\PayChanguIntegration;
use Alluvamz\PayChanguMobile\Data\Request\ChargeMobileRequestData;

$payChangu = new PayChanguIntegration('YOUR_PRIVATE_KEY');

$payChangu->getDirectChargeStatus('YOUR_CHARGE_ID')
```
