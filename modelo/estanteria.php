<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estanteria
 *
 * @author Marco
 */
class estanteria {
    //put your code here
    
    private $id; //nose si esta bien porque no lo utilizo y cuando creo el objeto el id no tiene valor solamente en la tabla
    private $codigo;
    private $material;
    private $nlejas;
    private $pasillo;
    private $npasillo;
    private $lejasocupadas=0;
   // private $arraydecajas; //no lo utilizo porque uso ocupación
    
    function __construct($codigo, $material, $nlejas, $pasillo, $npasillo,$lejasocupadas) {
        $this->codigo = $codigo;
        $this->material = $material;
        $this->nlejas = $nlejas;
        $this->pasillo = $pasillo;
        $this->npasillo = $npasillo;
         $this->lejasocupadas = $lejasocupadas;
    }
    function getId(){
        
        return $this->id;
    }
            function getCodigo() {
        return $this->codigo;
    }

    function getMaterial() {
        return $this->material;
    }

    function getNlejas() {
        return $this->nlejas;
    }

    function getPasillo() {
        return $this->pasillo;
    }

    function getNpasillo() {
        return $this->npasillo;
    }

    function getLejasocupadas() {
        return $this->lejasocupadas;
    }
   

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setNlejas($nlejas) {
        $this->nlejas = $nlejas;
    }

    function setPasillo($pasillo) {
        $this->pasillo = $pasillo;
    }

    function setNpasillo($npasillo) {
        $this->npasillo = $npasillo;
    }

    function setLejasocupadas($lejasocupadas) {
        $this->lejasocupadas = $lejasocupadas;
    }
    function setId($id) {
        $this->id = $id;
    }
   /* function getArraydecajas() {
        return $this->arraydecajas;
    }

    function setArraydecajas($arraydecajas) {
        $this->arraydecajas = $arraydecajas;
    }
*/
    
        public function __toString() {
        
        return "Estanteria: <br> codigo: ".$this->codigo.
                " <br>material: ".$this->material.
                "<br>numero de lejas: ".$this->nlejas.
                " <br>pasillo: ".$this->pasillo.
                " <br>numero de pasillo: ".$this->npasillo.
                " <br>lejas ocupadas: ".$this->lejasocupadas;
        
    }
   /* public function añadircaja($caja){                            de momento no me hace falta
        $lejaslibres= $this->nlejas-$this->lejasocupadas;
         if(sizeof($this->arraydelejas)<$lejaslibres){
          
          $this->arraydelejas[$_REQUEST['lejadelaestanteria']]=$caja;
          $this->lejasocupadas++;
          
          
      }
        
        
        
    }*/ 


    
    
    
}
