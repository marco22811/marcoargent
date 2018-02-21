<?php
include_once '../dao/operaciones.php';
include_once '../modelo/cajabackup.php';
session_start();
//recuperamos el codigo de la caja que guardamos en esta sesion en el controlconfirmar
$codigo=$_SESSION['objcajabackup']->getCodigo();
//llamamos al metodo de operaciones que borra la caja de la base de datos
operaciones::vendercaja($codigo);
header("Location:../vista/vistacorrecto.php");
