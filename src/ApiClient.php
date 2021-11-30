<?php
namespace Forgingblock;
use Requests;
class ApiClient{

	var $RequestData = array();
	var $ResponseData = array();
	var $ApiMode ;	
	var $APIBaseURL ;	
	
	function __construct($ApiMode) {
		$this->ApiMode = $ApiMode;		
		$this->APIBaseURL = ($this->ApiMode == 'test') ? 'https://api-demo.forgingblock.io' : 'https://api.forgingblock.io';
		
	}
	
	public function SetValue($key, $value){
		$this->RequestData[$key] = $value;			
	}
	
	public function GetValue($key){
		$retvalue = (array_key_exists($key, $this->ResponseData)) ? $this->ResponseData[$key] : '';		
		return  $retvalue;		
	}
	
	public function GetError(){		
		return  $this->GetValue('error');
	}
	
	public function GetInvoiceURL(){		
		return  $this->GetValue('url');
	}
	
	public function GetInvoiceID(){		
		return  $this->GetValue('id');
	}
	
	public function GetInvoiceStatus(){		
		return  $this->GetValue('status');
	}
	
	public function CreateInvoice(){
		return $this->DoApiCall($this->APIBaseURL.'/create-invoice');
	}
	
	public function CheckInvoiceStatus(){
		return $this->DoApiCall($this->APIBaseURL.'/check-invoice');
	}

	public function DoApiCall($url){
		$options = array(
			'timeout' => 300,
		);	
		
		Requests::register_autoloader();
		$headers = array(
    		'Content-Type' => 'application/x-www-form-urlencoded'
		);
				
		$resar = Requests::post($url, $headers, $this->RequestData, $options);						
		
		$this->ResponseData = json_decode($resar->body, true);		
		return $this->ResponseData;
	}
}

?>