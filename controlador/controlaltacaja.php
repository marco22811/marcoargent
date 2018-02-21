<?php

include_once '../dao/operaciones.php';
include_once '../dao/conexionBBDD.php';
global $conexion;
//recuperamos los datos de la vista
$codigo=$_REQUEST['codigocaja'];
$color=$_REQUEST['colorcaja'];
$altura=$_REQUEST['altura'];
$anchura=$_REQUEST['anchura'];
$profundidad=$_REQUEST['profundidad'];
$material=$_REQUEST['material'];
$contenido=$_REQUEST['contenido'];
$fecha=date("d")."-".date("m")."-".date("Y");
$estanteria=$_REQUEST['estanteriacontenedora'];
$leja=$_REQUEST['lejadelaestanteria'];
//creamos un objeto caja que le pasamos a operaciones

$objcaja=new caja($codigo,$color,$altura,$anchura,$profundidad,$material,$contenido,$fecha);
//montamos una transaccion para añadir la caja y añadir la ocupacion
$conexion->autocommit(false);

try {
 operaciones::anadircaja($objcaja);
 $idcaja=operaciones::dameid($codigo,"caja");//necesitamos el id de la caja y de la estanteria para crear el objeto ocupacion
$idestanteria=operaciones::dameid($estanteria,"estanteria");
$objocupacion=new ocupacion($idcaja, $idestanteria, $leja);
operaciones::anadirocupacion($objocupacion);
 $conexion->commit();
 //si todo va bien nos manda a una vista en las que nos dice que todo esta correcto
  header("Location:../vista/vistacorrecto.php");
 
 } catch (altaException $ce) {
   
    $conexion->rollback();
    header("Location:../vista/vistaerrores.php?excepcion=$ce");
}












