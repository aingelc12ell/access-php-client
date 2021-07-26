<?php

namespace ACCESS;
class Course{
    private $ID;
    private $Request = array();
    
    function __construct($courseid,$term='',$schoolyear=''){
        $this->ID = $courseid;
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
    function getInfo($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'course',
            'call' => 'info',
            'courseid' => $this->ID,
            'field' => 'courseid',
            ]);
    }
    function getLevels($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'course',
            'call' => 'levels',
            'courseid' => $this->ID,
            'field' => 'courseid',
            ]);
    }
    function getSections($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'course',
            'call' => 'sections',
            'courseid' => $this->ID,
            'field' => 'courseid',
            ]);
    }
    function getClasses($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'course',
            'call' => 'classes',
            'courseid' => $this->ID,
            'field' => 'courseid',
            ]);
    }
    function getAssessment($params=array()){
        return array_merge($this->Request,$params,[
            'action' => 'course',
            'call' => 'assessment',
            'courseid' => $this->ID,
            'field' => 'courseid',
            ]);
    }
}