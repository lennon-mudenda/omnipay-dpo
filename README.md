# Omnipay DPO Payments Gatway

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lennon-mudenda/omnipay-dpo.svg?style=flat-square)](https://packagist.org/packages/lennon-mudenda/omnipay-dpo)
[![Total Downloads](https://img.shields.io/packagist/dt/lennon-mudenda/omnipay-dpo.svg?style=flat-square)](https://packagist.org/packages/lennon-mudenda/omnipay-dpo)
![GitHub Actions](https://github.com/lennon-mudenda/omnipay-dpo/actions/workflows/main.yml/badge.svg)

Omnipay is a collection of packages that offer  a consistent set interface for the handling of payments online. The packages depend on the 
[omnipay/common](https://github.com/thephpleague/omnipay-common) package to ensure provision of this interface consistently. DPO had no gateway
among the list of currently supported gateways which is the reason why this package was born. The package is geared towards ensuring the community
has a DPO Payments gateway among the Omnipay packages and will also give rise to an updated package that extends the features of 
the [dpo/dpo-pay-common](https://github.com/DPO-Group/DPO-Pay-Common) package which seems to have limited functionality or flexibility considering
what most PHP projects may need. 

## Installation

You can install the package via composer:

```bash
composer require lennon-mudenda/omnipay-dpo
```

## Usage

```php

use Omnipay\DPO\Gateway;

// Declare a transaction array here
$paymentData = [
	'testMode' => true, // You would need to switch this to false once your application goes live
	'amount' => 85,
	'paymentCurrency' => 'USD',
	'companyToken' => '', // Pass your DPO company token here.
	'serviceType' => '', // Pass your DPO product service id here.
];

$gateway = new Gateway();

$request = $gateway->purchase(
	$paymentData
);

$response = $request->send();

//  After this you can call methods on the response object.
$response->isRedirect(); // Tells you if the response will redirect us to the DPO Payments page.

$response->isSuccessful(); // Tells you if the DPO request was successful

$response->getMessage(); // Gets the DPO request message

$response->getTransactionReference(); // Gets the DPO transaction message

$response->isCancelled(); // Tells you if the transaction was cancelled or not



```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email lensig13@gmail.com instead of using the issue tracker.

## Credits

-   [Lennon Mudenda](https://github.com/lennon-mudenda)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com) by [Beyond Code](http://beyondco.de/).
