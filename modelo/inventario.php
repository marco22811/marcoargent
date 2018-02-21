<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inventario
 *
 * @author Marco
 */
class inventario {
    private $fecha;
    private $estanteriaconcaja;//es un array de estanterias con un array de cajas
    
    function __construct($fecha,$estanteriaconcaja) {
        $this->fecha = $fecha;
        $this->estanteriaconcaja=$estanteriaconcaja;
      
    }
    function getFecha() {
        return $this->fecha;
    }

    function getEstanteriaconcaja() {
        return $this->estanteriaconcaja;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setEstanteriaconcaja($estanteriaconcaja) {
        $this->estanteriaconcaja = $estanteriaconcaja;
    }

    public function __toString() {
        $cad= "    La fecha del inventario es; " . $this->fecha ."<br>";
    
          for ($i = 0; $i < count($this->arraydecajas); $i++) {
           $cad.= "   leja numero: " .$i  .$this->arraydecajas[$i]."</br></br>";
    }
}
    
}
