<?php

namespace App\Models;

trait MiscMaths
{
    
    /*
     * ok this figures out how far away form the mid point each result is
     */
    private function figureDeviation(String $field) : void {
        
        $data = array();
        
        array_walk($this->games, function($val) use(&$data, $field) {
            if(!isset($data[$val->$field])) {
                $data[$val->$field] = 0;
            }
            $av = ($val->players+1) / 2;
            $deviation = 0;
            //no I dont know how to do standard deviation
            if($val->position != $av) $deviation = $av - $val->position;
            else $deviation = 0;
            
            $data[$val->$field] += $deviation;
        });
            
        $this->deviation = $data;
    }
}