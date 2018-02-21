<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'caja.php';

class cajaconleja extends caja{
   private $leja;
   
   function getLeja() {
       return $this->leja;
   }

   function setLeja($leja) {
       $this->leja = $leja;
   }
   public function __construct($codigo, $color, $altura, $anchura, $profundidad, $material, $contenido, $fecha_alta,$leja) {
       parent::__construct($codigo, $color, $altura, $anchura, $profundidad, $material, $contenido, $fecha_alta);
       $this->leja=$leja;
   }
   public function __toString() {
      return parent::__toString()." Leja en la que esta situada: ".$this->leja;
   }



}
