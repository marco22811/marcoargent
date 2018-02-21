<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of buscarException
 *
 * @author Marco
 */
class buscarException extends Exception{
    //put your code here


   
public function __construct($message) {
    parent::__construct($message,null);
  
}
public function __toString() {
    
    return __CLASS__."|   mensaje:  ".$this->message ;
     }
   
     
     
    }