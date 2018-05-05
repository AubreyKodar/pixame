<?php namespace AubreyKodar\Pixame;
use GuzzleHttp;
use AubreyKodar\Pixame\Exceptions;

class Pixame{

	private $key;
	private $baseUrl = 'https://pixabay.com/api/';
	private $httpClient;

   public function __construct($key) {
		$this->key = $key;
		$this->httpClient = new GuzzleHttp\Client();
   }
   public function Search($keyword, $ReturnArray = false,$type = 'photo'){

   	try{

   		$resp =  $this->httpClient->get($this->baseUrl.'?key='.$this->key.'&q='.urlencode($keyword).'&image_type='.$type);

	    if($resp->getStatusCode() == 200){
	    	return GuzzleHttp\json_decode($resp->getBody(), $ReturnArray);

	    }else{
		    throw new Exceptions\PixameException($resp->getReasonPhrase(),$resp->getStatusCode());
	    }

    }catch (GuzzleHttp\Exception\ClientException $exception){

   		throw new Exceptions\PixameException($exception->getMessage(),$exception->getCode());

    }

   }
}