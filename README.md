# ForgingBlock PHP
The official PHP library for the [ForgingBlock API](https://api.forgingblock.io/docs/).

## PHP versions
PHP  version 5.4 and above are supported.

## Documentation
For more details visit [ForgingBlock API docs](https://api.forgingblock.io/docs/).

## Installation

Install with ``composer``:
``` sh
composer require forgingblock/forgingblock-php
```

## Usage
``` php
use Forgingblock\ApiClient;

//$payment_mode are test or live
$forgingblock = new ApiClient($payment_mode);
$forgingblock->SetValue('trade',  $trade);
$forgingblock->SetValue('token', $token);
$forgingblock->SetValue('amount', round($amount, 2));								
$forgingblock->SetValue('currency',$currency_code);		
$forgingblock->SetValue('link', $returnURL);
$forgingblock->SetValue('notification', $notifyURL);
$forgingblock->SetValue('order', $order_id);
$forgingblock->CreateInvoice();				
$InvoiceURL = $forgingblock->GetInvoiceURL();
if ($InvoiceURL) header('Location: '.$InvoiceURL);
else echo  $forgingblock->GetError();
```
## Notifications
``` php
use Forgingblock\ApiClient;
$forgingblock = new ApiClient($payment_mode);
$forgingblock->SetValue('trade',  $trade);
$forgingblock->SetValue('token', $token);
$forgingblock->SetValue('invoice', $invoice_id);		
		
$forgingblock->CheckInvoiceStatus();
$payment_status = $forgingblock->GetInvoiceStatus();
