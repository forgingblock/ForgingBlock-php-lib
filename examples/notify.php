<?php
	require_once(dirname(__FILE__) . '/vendor/autoload.php');	
	require_once(dirname(__FILE__) . '/config.php');	
	use Forgingblock\ApiClient;
	$json_res = file_get_contents('php://input');	
	$resAr = json_decode($json_res, true);
	$invoice_id = $resAr['id'];
	if (!empty($invoice_id))
	{    
		$forgingblock = new ApiClient($payment_mode);
		$forgingblock->SetValue('trade',  $trade);
		$forgingblock->SetValue('token', $token);
		$forgingblock->SetValue('invoice', $invoice_id);		
		
		$forgingblock->CheckInvoiceStatus();
		$payment_status = $forgingblock->GetInvoiceStatus();
		if ($payment_status == 'paid'){
			//add ur paid code
		}	
	}
	echo "OK";
?>