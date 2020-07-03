<?php

namespace ACCESS;
class Request{
    private $Request;
    
    
    function __construct($requestArray,&$client){
        $this->Request = $this->parse($requestArray,$client);
    }
    function getArray(){
        return $this->Request;
    }
    function parse($requestArray,&$client){
        $requestArray = is_array($requestArray) ? $requestArray : array($requestArray);
        $retvalue = array_merge(
            [
                'field' => '',
                'action' => '',
                'call' => 'info',
                'id' => '',
            ],$requestArray);
        $retvalue['key'] = $client->APIKey();
        $retvalue['sid'] = uniqid('ai');
        $retvalue['sec'] = sha1($retvalue[$retvalue['field']].$retvalue['sid'].$client->APIhash());
        
        return $retvalue;
    }
    function urlStr(){
        return http_build_query($this->Request);
    }
}