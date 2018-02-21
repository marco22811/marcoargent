<?php

include_once '../dao/operaciones.php';


//recuperamos la opcion enviada desde la vista ventacaja o devolucioncaja
$opcion=$_REQUEST['opcion'];
//si viene de venta entonces entra a esta opcion
if($opcion==="venta"){

try {
    //recogemos el codigo de la caja a vender que se ha introducido
    $codigo=$_REQUEST['codigovender'];
    //llamamos a este metodo de operaciones que devuelve los datos de la caja que vamos a vender
$objcajabackup=operaciones::datoscajabackup($codigo);
//le pasamos el objeto a la vista confirmar
session_start();
$_SESSION["objcajabackup"]=$objcajabackup;
header("Location:../vista/confirmar.php");
    }
 catch (buscarException $ce) {
    header("Location:../vista/vistaerrores.php?excepcion=$ce");
     }
}


//si viene de devolucion entra a esta opcion
if($opcion==="devolucion"){
    $codigo=$_REQUEST['codigodevolver'];
   try {
       //llamamos al metodo de operaciones que devuelve un objeto con todos los datos de la caja backup y lo pasamos a sesion para recogerlo en la vista confirmar devolucion
    $objcajadevuelta=operaciones::datoscajadevuelta($codigo);
    session_start();
    $_SESSION["objcajabackup"]=$objcajadevuelta;
    //llamamos al metodo estanterias libres para que podamos darle una nueva ubicacion en la vista confirmardevolucion
    $codigosestanteriaslibres=operaciones::estanteriaslibres();
    $_SESSION["codigosestanteriaslibres"]=$codigosestanteriaslibres;
    header("Location:../vista/confirmardevolucion.php");
    } 
    catch (buscarException $ce) {
    header("Location:../vista/vistaerrores.php?excepcion=$ce");
    } 
    
    
    
}