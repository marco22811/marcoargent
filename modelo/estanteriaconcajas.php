<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estanteriaconcajas
 *
 * @author Marco
 */
include_once 'estanteria.php';
class estanteriaconcajas extends estanteria{
 private $arraydecajas;
 public function __construct($codigo, $material, $nlejas, $pasillo, $npasillo, $lejasocupadas,$arraydecajas) {
     parent::__construct($codigo, $material, $nlejas, $pasillo, $npasillo, $lejasocupadas);
     $this->arraydecajas=$arraydecajas;
     
 }
 function getArraydecajas() {
     return $this->arraydecajas;
 }

 function setArraydecajas($arraydecajas) {
     $this->arraydecajas = $arraydecajas;
 }

 public function __toString() {
   $cad=  parent::__toString();
           
            for ($i = 0; $i < count($this->arraydecajas); $i++) {
           $cad= "cajas:". $this->arraydecajas[$i]."</br></br>";
 }
 return $cad;
 
}


}
