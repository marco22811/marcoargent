<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of caja
 *
 * @author Marco
 */
class caja {
     //no se podran hacer objetos caja si la declaramos abstracta
    private $id;
    private $codigo; 
    private $color;
    private $altura;
    private $anchura;
    private $profundidad;
    private $material;
    private $contenido;
    private $fecha_alta;
    private $estanteria;
    private $leja;
            
    function __construct($codigo, $color, $altura, $anchura, $profundidad, $material, $contenido, $fecha_alta/*$estanteria,$leja*/) {
        $this->codigo = $codigo;
        $this->color = $color;
        $this->altura = $altura;
        $this->anchura = $anchura;
        $this->profundidad = $profundidad;
        $this->material = $material;
        $this->contenido = $contenido;
        $this->fecha_alta = $fecha_alta;
       // $this->estanteria=$estanteria;
      //  $this->leja=$leja;
    }
    function getId(){
        return $this->id;
    }
            function getCodigo() {
        return $this->codigo;
    }

    function getColor() {
        return $this->color;
    }

    function getAltura() {
        return $this->altura;
    }

    function getAnchura() {
        return $this->anchura;
    }

    function getProfundidad() {
        return $this->profundidad;
    }

    function getMaterial() {
        return $this->material;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getFecha_alta() {
        return $this->fecha_alta;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setAnchura($anchura) {
        $this->anchura = $anchura;
    }

    function setProfundidad($profundidad) {
        $this->profundidad = $profundidad;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setFecha_alta($fecha_alta) {
        $this->fecha_alta = $fecha_alta;
    }

    public function __toString() {
       
        
        return "Caja: <br> codigo: ".$this->codigo.
                " <br>color: ".$this->color.
                "<br>altura: ".$this->altura.
                " <br>anchura: ".$this->anchura.
                " <br>profundidad: ".$this->profundidad.
                " <br>material: ".$this->material.
                " <br>contenido: ".$this->contenido.
                " <br>fecha de alta: ".$this->fecha_alta;
    }


}
