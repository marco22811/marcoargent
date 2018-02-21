<?php


//include_once "../dao/conexionBBDD.php";
  //  include_once '../modelo/estanteria.php';
include_once '../dao/operaciones.php';
//include_once '../modelo/caja.php';
session_start();
    

    
$listacajas=operaciones::listarcajas();  
$_SESSION["listacajas"]=$listacajas;//lo guardamos en una variable de sesion para recogerlo en la vista listacajas
header("Location:../vista/listacajas.php");

