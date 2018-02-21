<?php

include_once '../dao/operaciones.php';


$codigosestanteriaslibres=operaciones::estanteriaslibres();
session_start();
$_SESSION["codigosestanteriaslibres"]=$codigosestanteriaslibres;
header("Location:../vista/altacaja.php");
