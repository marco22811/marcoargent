<?php
//recogemos los valores enviados
$codigo=$_REQUEST['codigoestanteria'];
$material=$_REQUEST['materialestanteria'];
$numerolejas=$_REQUEST['numerodelejas'];
$pasillo=$_REQUEST['pasillo'];
$numeropasillo=$_REQUEST['numero'];
$lejasocupadas=0;


include '../dao/operaciones.php';

//creamos el objeto estanteria con las lejas ocupadas a 0
$objestanteria=new estanteria($codigo,$material,$numerolejas,$pasillo,$numeropasillo,$lejasocupadas);
//echo $objestanteria;
try {
operaciones::anadirestanteria($objestanteria);
 header("Location:../vista/vistacorrecto.php");
 } catch (altaException $ce) {    
    header("Location:../vista/vistaerrores.php?excepcion=$ce");
}


