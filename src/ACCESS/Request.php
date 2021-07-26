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
        $rr = $requestArray;
        foreach($rr as $i => $v){
            $requestArray[$i] = $this->encodeValues($v);
        }
        $retvalue = array_merge(
            [
                'field' => '',
                'action' => '',
                'call' => 'info',
                'id' => sha1(uniqid('',true)).sha1(date('U')),
            ],$requestArray);
        $retvalue['key'] = $client->APIKey();
        $retvalue['sid'] = uniqid('ai');
        $retvalue['sec'] = sha1($retvalue[$retvalue['field']].$retvalue['sid'].$client->APIhash());
        
        return $retvalue;
    }
    function encodeValues($values){
        if(is_array($values)){
            $val = $values;
            foreach($val as $i => $v){
                $values[$i] = $this->encodeValues($v);
            }
            #$values = json_encode($values,JSON_FORCE_OBJECT); ##2021-07-26: leave it as an array
        }
        return $values;
    }
    function urlStr(){
        return http_build_query($this->Request);
    }
}