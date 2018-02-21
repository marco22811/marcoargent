<?php
//include_once "../dao/conexionBBDD.php";
  //  include_once '../modelo/estanteria.php';
include_once '../dao/operaciones.php';
//include_once '../modelo/caja.php';
session_start();
    

    
$listaestanterias=operaciones::listarestanterias();  //el listado estanterias devuelve el array  de objetos estanteria y todos los datos de cada una
$_SESSION["listaestanterias"]=$listaestanterias;//lo guardamos en una variable de sesion para recogerlo en la vista listaestanterias
header("Location:../vista/listaestanterias.php");
    

