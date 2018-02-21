<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of altaException
 *
 * @author Marco
 */
class altaException extends Exception{
   
public function __construct($message,$code) {
    parent::__construct($message,$code,null);
  
}
public function __toString() {
    
    return __CLASS__."|   mensaje:  ".$this->message." |  codigo de error:   ".$this->code  ;
     }
   
     
     
    }


