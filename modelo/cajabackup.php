<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cajabackup
 *
 * @author Marco
 */
 include_once 'caja.php';
class cajabackup extends caja{
 

    private $codigoestanteria;
   private $lejaestanteria;
   private $fechadebaja;
   private $id;
   
  
   public function __construct($codigo, $color, $altura, $anchura, $profundidad, $material, $contenido, $fecha_alta,$codigoestanteria,$lejaestanteria,$fechadebaja) {
       parent::__construct($codigo, $color, $altura, $anchura, $profundidad, $material, $contenido, $fecha_alta);
       $this->codigoestanteria=$codigoestanteria;
       $this->lejaestanteria=$lejaestanteria;
       $this->fechadebaja=$fechadebaja;
   }
   
   function getCodigoestanteria() {
       return $this->codigoestanteria;
   }

   function getLejaestanteria() {
       return $this->lejaestanteria;
   }

   function getFechadebaja() {
       return $this->fechadebaja;
   }

   function setCodigoestanteria($codigoestanteria) {
       $this->codigoestanteria = $codigoestanteria;
   }

   function setLejaestanteria($lejaestanteria) {
       $this->lejaestanteria = $lejaestanteria;
   }

   function setFechadebaja($fechadebaja) {
       $this->fechadebaja = $fechadebaja;
   }

   function setId($id) {
       $this->id = $id;
   }

   function getId() {
       return $this->id;
   }

      
   
   
   public function __toString() {
      return parent::__toString()."codigo de la estanteria en la que estaba situada: ".$this->codigoestanteria.
              " Leja en la que estaba situada: ".$this->lejaestanteria." fecha de baja: ".$this->fechadebaja;
   }





}
