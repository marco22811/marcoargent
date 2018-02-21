<?php


include_once '../dao/operaciones.php';
include_once '../modelo/cajabackup.php';
session_start();
//recogemos la nueva ubicacion de la vista confirmar devolucion
$estanteria=$_REQUEST['estanteriacontenedora'];
$leja=$_REQUEST['lejadelaestanteria'];
//recuperamos el codigo de la sesion que hicimos para el controlconfirmar que usabamos para mostrar los datos de la caja a devolver
$codigo=$_SESSION['objcajabackup']->getCodigo();
//llamamos al metodo devolver caja que crea el trigger y hace todas las operaciones necesarias
operaciones::devolvercaja($codigo,$estanteria,$leja);
header("Location:../vista/vistacorrecto.php");

