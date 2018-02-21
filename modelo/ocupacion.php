<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ocupacion
 *
 * @author Marco
 */
class ocupacion {
    private $id;
    private $idcaja;
    private $idestanteria;
  //  private $objcaja; no se si hay que recibir el objeto o con el id de la caja y la estanteria vale
    //private $objestanteria;
    private $lejaocupada;
    
    function __construct($idcaja, $idestanteria, $lejaocupada) {
        $this->idcaja = $idcaja;
        $this->idestanteria = $idestanteria;
        $this->lejaocupada = $lejaocupada;
    }

    
    function getIdcaja() {
        return $this->idcaja;
    }

    function getIdestanteria() {
        return $this->idestanteria;
    }

    function getLejaocupada() {
        return $this->lejaocupada;
    }

    function setIdcaja($idcaja) {
        $this->idcaja = $idcaja;
    }

    function setIdestanteria($idestanteria) {
        $this->idestanteria = $idestanteria;
    }

    function setLejaocupada($lejaocupada) {
        $this->lejaocupada = $lejaocupada;
    }

    public function __toString() {
      return "Id caja: ".$this->idcaja.
                " <br>Id estanteria: ".$this->idestanteria.
                "<br>leja que ocupa la caja: ".$this->lejaocupada;
                
    }

}
