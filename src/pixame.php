<?php namespace AubreyKodar\pixame;
use GuzzleHttp;

class pixame{

	private $key;
	private $baseUrl = 'https://pixabay.com/api/';
	private $httpClient;

   public function __construct($key) {
		$this->key = $key;
		$this->httpClient = new GuzzleHttp\Client();
   }
   public function Search($keyword, $type = 'photo'){

   	try{

   		$resp =  $this->httpClient->get($this->baseUrl.'?key='.$this->key.'&q='.urlencode($keyword).'&image_type='.$type);

	    if($resp->getStatusCode() == 200){
	    	return GuzzleHttp\json_decode($resp->getBody());
	    }else{

	    }

    }catch (GuzzleHttp\Exception\ClientException $exception){

    }

   }
}