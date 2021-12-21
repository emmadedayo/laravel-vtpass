# Laravel Vtpass


This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

<img src="https://github.com/emmadedayo/laravel-vtpass/blob/master/unnamed.png" width="100%"/>
## Installation

Via Composer

```bash
$ composer require emmadedayo/laravel-vtpass
```

## Setup
The package will automatically register a service provider.

You need to publish the configuration file:

```bash
php artisan vendor:publish --provider="Emmadedayo\VtPass\VTPassServiceProvider"
```

This is the default content of the config file ```vtpass.php```:

```php
<?php

return [
  "username"          => env("VTPASS_USERNAME"),
  "password"          => env("VTPASS_PASSWORD"),
  // specify to use sandbox mode or live mode
   "mode"              => env("VTPASS_MODE", "sandbox"), // app mode sandbox ?? live
];
```
Update Your Projects `.env` with:
```bash
VTPASS_USERNAME=xxx@xxxx.com
VTPASS_PASSWORD=xxxxxx
VTPASS_MODE=sandbox //leave at sandbox for testing purpose
```

## Available Api's Model
```php
Emmadedayo\VtPass\Model\VTClassicPurchase;
Emmadedayo\VtPass\Model\VTModernPurchase;
```

## Explicit Usage

### Get Service and Variational Code (Modern Model and Classic Ways)

```php
use Emmadedayo\VtPass\Model\MobileAirtime;

public function loadData(){
 
  VTModernPurchase::getServiceID([
      'identifier'=>'tv-subscription'
  ]); 
  
  VTModernPurchase::variations([
      'serviceID'=>'gotv'
  ]); 
  
  VTModernPurchase::category();
  
  VTModernPurchase::getProductOptions([
        'serviceID'=>'aero',
        'name'=>'passenger_type'
  ]);  
  
}
```

### Buying Airtime in (Modern Model Way)

```php
use Emmadedayo\VtPass\Model\MobileAirtime;

public function buyAirtime(){ 
  $serviceID = 'mtn';
  $phone = '08011111111'; //demo phone number
  $amount = 100;
  $requestID = rand(1000,9000); //save your request id for re-query and verification purpose(optional)

  $result =  VTModernPurchase::purchase([
    'serviceID'   => $serviceID,
    'phone'       => $phone,
    'amount'      => $amount,
  ]);
  
  return Response::json($result);
  
}
```
#### Response
```json
{
    "code": "000",
    "content": {
        "transactions": {
            "status": "delivered",
            "product_name": "MTN Airtime VTU",
            "unique_element": "08011111111",
            "unit_price": 100,
            "quantity": 1,
            "service_verification": null,
            "channel": "api",
            "commission": 4,
            "total_amount": 96.5,
            "discount": null,
            "type": "Airtime Recharge",
            "email": "emmanzley@yahoo.com",
            "phone": "08103141424",
            "name": null,
            "convinience_fee": 0,
            "amount": 100,
            "platform": "api",
            "method": "api",
            "transactionId": "16397074258999566580332982"
        }
    },
    "response_description": "TRANSACTION SUCCESSFUL",
    "requestId": "123255",
    "amount": "100.00",
    "transaction_date": {
        "date": "2021-12-17 03:17:05.000000",
        "timezone_type": 3,
        "timezone": "Africa/Lagos"
    },
    "purchased_code": ""
}
```
#### Status
```php
VTModernPurchase::status([
  'request_id' => '24545544'
]);
```
#### Response
```json
{
    "code": "000",
    "content": {
        "transactions": {
            "status": "delivered",
            "product_name": "MTN Airtime VTU",
            "unique_element": "08011111111",
            "unit_price": 100,
            "quantity": 1,
            "service_verification": null,
            "channel": "api",
            "commission": 4,
            "total_amount": 96.5,
            "discount": null,
            "type": "Airtime Recharge",
            "email": "emmanzley@yahoo.com",
            "phone": "08103141424",
            "name": null,
            "convinience_fee": 0,
            "amount": 100,
            "platform": "api",
            "method": "api",
            "transactionId": "16397074258999566580332982"
        }
    },
    "response_description": "TRANSACTION SUCCESSFUL",
    "requestId": "123255",
    "amount": "100.00",
    "transaction_date": {
        "date": "2021-12-17 03:17:05.000000",
        "timezone_type": 3,
        "timezone": "Africa/Lagos"
    },
    "purchased_code": ""
}
```



### Buying Data in (Classic Model Way)

```php
use Emmadedayo\VtPass\Model\MobileData;

public function buyData(){ 

    $requestID = rand(1000,9000); //save your request id for re-query and verification purpose(optional)
    $serviceID = 'mtn-data';
    $billersCode = '08011111111';
    $variationCode = "mtn-10mb-100";
    $phone = '08011111111';
    $amount = 100;
    
     $result =  VTClassicPurchase::purchaseData($requestID,$serviceID,$billersCode,$variationCode,$amount,$phone);
     return Response::json($result);
      
}
```
#### Response
```json
{
    "code": "000",
    "content": {
        "transactions": {
            "status": "delivered",
            "product_name": "MTN Data",
            "unique_element": "08011111111",
            "unit_price": 100,
            "quantity": 1,
            "service_verification": null,
            "channel": "api",
            "commission": 4,
            "total_amount": 96,
            "discount": null,
            "type": "Data Services",
            "email": "emmanzley@yahoo.com",
            "phone": "08103141424",
            "name": null,
            "convinience_fee": 0,
            "amount": 100,
            "platform": "api",
            "method": "api",
            "transactionId": "16397076684791728393807589"
        }
    },
    "response_description": "TRANSACTION SUCCESSFUL",
    "requestId": "09092109",
    "amount": "100.00",
    "transaction_date": {
        "date": "2021-12-17 03:21:08.000000",
        "timezone_type": 3,
        "timezone": "Africa/Lagos"
    },
    "purchased_code": ""
}
```
#### Status
```php
MobileData::status([
  'request_id' => '24545544'
]);
```
#### Response
```json
{
    "code": "000",
    "content": {
        "transactions": {
            "status": "delivered",
            "product_name": "MTN Data",
            "unique_element": "08011111111",
            "unit_price": 100,
            "quantity": 1,
            "service_verification": null,
            "channel": "api",
            "commission": 4,
            "total_amount": 96,
            "discount": null,
            "type": "Data Services",
            "email": "emmanzley@yahoo.com",
            "phone": "08103141424",
            "name": null,
            "convinience_fee": 0,
            "amount": 100,
            "platform": "api",
            "method": "api",
            "transactionId": "16397076684791728393807589"
        }
    },
    "response_description": "TRANSACTION SUCCESSFUL",
    "requestId": "09092109",
    "amount": "100.00",
    "transaction_date": {
        "date": "2021-12-17 03:21:08.000000",
        "timezone_type": 3,
        "timezone": "Africa/Lagos"
    },
    "purchased_code": ""
}
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author instead of using the issue tracker.

## Credits

- [Emmadedayo](https://github.com/emmadedayo)
- [myckhel](https://github.com/myckhel)
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[link-contributors]: ../../contributors
