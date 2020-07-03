<?php
/**
* 
$Client = new ACCESS\Client(array(
   'application' => '', #name of system calling the request
    'school' => '', #SCHOOLNAMESETTINGS
    'key' => '', #API Key provided by school
    'hash' => '', #API has string provided by school
    'url' => 'https://api.accessphp.net/', #URL of the API specifically for the school
    'systemid' => '', #
    'debug' => false,
   ))
$Student = new ACCESS\Student('9504266');
$result = $Client->sendRequest($Student->getInfo());
 
********************/
namespace ACCESS;

class Client{
    const VERSION = '0.1';
    private $config;
    
    function __construct($config=array()){
        $this->config = array_merge(
            [
                'application' => '', #name of system calling the request
                'school' => '', #SCHOOLNAMESETTINGS
                'key' => '', #API Key provided by school
                'hash' => '', #API has string provided by school
                'url' => 'https://api.accessphp.net/', #URL of the API specifically for the school
                'systemid' => '', #
                'debug' => false,
            ]
            ,$config);
    }
    function version(){
        return self::VERSION;
    }
    function APIkey($key){
        return $this->config['key'];
    }
    function APIhash($string){
        return $this->config['hash'];
    }
    function URL($url){
        return $this->config['url'];
    }
    function config($key){
        return isset($this->config[$key]) ? $this->config[$key] : null;
    }
    
    
    function setAPIKey($key){
        $this->config['key'] = $key;
    }
    function setAPIHash($string){
        $this->config['hash'] = $string;
    }
    function setURL($url){
        $this->config['url'] = $url;
    }
    function setConfig($key,$value){
        $this->config[$key] = $value;
    }
    
    
    function sendRequest($params){
        $Request = new Request($params,$this);
        $curl = curl_init();
        $curlopt = array(
            CURLOPT_URL => $this->config['url'].'?'.$Request->urlStr(),
            CURLOPT_USERAGENT => 'ACCESS API Call',
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $Request->getArray(),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
        );
        if(defined('STDIN')){
            $curlopt[CURLOPT_VERBOSE] = true;
        }
        curl_setopt_array($curl, $curlopt);
        $respx = curl_exec($curl);
        if($respx !== false){
            $retvaluex = strpos($respx,'{')!==false ? json_decode($respx,true) : (array)$respx;
        }
        curl_close($curl);
        return $retvaluex;
    }
}