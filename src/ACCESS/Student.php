<?php

namespace ACCESS;
class Student{
    private $ID;
    private $Request;
    
    function __construct($studid,$term='',$schoolyear=''){
        $this->ID = $studid;
        if($term!=''){
            $this->setTerm($term);
        }
        if($schoolyear!=''){
            $this->setSchoolYear($schoolyear);
        }
    }
    function setTerm($term){
        $this->Request['term'] = $term;
    }
    function setSchoolYear($schoolyear){
        $this->Request['schoolyear'] = $schoolyear;
    }
    
    ## calls
    function getInfo($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'student',
            'call' => 'info',
            'studidinfo' => $this->ID,
            'field' => 'studidinfo',
            ]);
    }
    function authenticate($password){
        return array_merge($this->Request,[
            'action' => 'student',
            'call' => 'auth',
            'studidpass' => $this->ID,
            'field' => 'studidpass',
            'params' => array(
                'pass' => $password,
                )
            ]);
    }
    function getCurriculum($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'student',
            'call' => 'curriculum',
            'studcurr' => $this->ID,
            'field' => 'studcurr',
            ]);
    }
    function getGrades($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'student',
            'call' => 'grades',
            'studgrd' => $this->ID,
            'field' => 'studgrd',
            ]);
    }
    function getAssessment($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'student',
            'call' => 'assessment',
            'studgrd' => $this->ID,
            'field' => 'studgrd',
            ]);
    }
    
    function getBalances($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'student',
            'call' => 'balance',
            'studbal' => $this->ID,
            'field' => 'studbal',
            ]);
    }
    
    function getLedgers($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'student',
            'call' => 'ledgerHistory',
            'studlh' => $this->ID,
            'field' => 'studlh',
            ]);
    }
    
    function enlistment($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'student',
            'call' => 'enlistment',
            'studel' => $this->ID,
            'field' => 'studel',
            ]);
    }
    function enlist($schedules,$params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'student',
            'call' => 'enlist',
            'studem' => $this->ID,
            'field' => 'studem',
            'params' => $schedules,
            ]); 
    }
    function drop($schedules,$params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'student',
            'call' => 'drop',
            'studrp' => $this->ID,
            'field' => 'studrp',
            'params' => $schedules,
            ]); 
    }
}