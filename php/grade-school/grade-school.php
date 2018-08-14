<?php

class School {

    protected $school;

    public function __construct(){

        $this->school = [];
        
    }

    public function add($name, $grade){
        if (key_exists($grade, $this->school)) {
            $this->school[$grade] = sort(array_merge([$name], $this->school[$grade]));
        } else {
            $this->school[$grade] = [$name];
        }
    }

    public function grade($grade){
        
        
    }
    public function getSchool(){

        return $this->school;
        
    
    }
}