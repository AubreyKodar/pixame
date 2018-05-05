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
   public function Search($keyword, $ReturnArray = false,$page = 1, $per_page = 20,$type = 'photo'){

   	try{

   		$resp =  $this->httpClient->get($this->baseUrl.'?key='.$this->key.'&q='.urlencode($keyword).'&image_type='.$type.'&page='.$page.'&per_page'.$per_page);

	    if($resp->getStatusCode() == 200){
	    	return GuzzleHttp\json_decode($resp->getBody(), $ReturnArray);

	    }else{
		    throw new Exceptions\PixameException($resp->getReasonPhrase(),$resp->getStatusCode());
	    }

    }catch (GuzzleHttp\Exception\ClientException $exception){

   		throw new Exceptions\PixameException($exception->getMessage(),$exception->getCode());
    }

   }
   public function DownloadImage($publicUrl, $filename, $storagePath){

   	try{

	    $resource = fopen($storagePath.$filename, 'w');
   		$resp = $this->httpClient->get($publicUrl,['sink' => $resource]);
	    fclose($resource);

   		if($resp->getStatusCode() == 200){
			return $storagePath.$filename;
	    }else{
		    throw new Exceptions\PixameException($resp->getReasonPhrase(),$resp->getStatusCode());
	    }


    }catch (GuzzleHttp\Exception\ClientException $exception){
	    throw new Exceptions\PixameException($exception->getMessage(),$exception->getCode());
    }
   }

}