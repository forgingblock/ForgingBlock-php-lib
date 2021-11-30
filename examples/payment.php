<?php
	require_once(dirname(__FILE__) . '/config.php');	
	require_once(dirname(__FILE__) . '/vendor/autoload.php');	
	use Forgingblock\ApiClient;
    
	//set order id
	$order_id = '';
	//set currency code
	$currency_code = 'USD';
	$amount = 1;
	
	//set return url 
	$returnURL = '';	
	//set notification url 
	$notifyURL = '';

	
	
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
?>