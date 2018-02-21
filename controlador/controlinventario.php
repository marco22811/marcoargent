<?php

include_once '../dao/operaciones.php';

session_start();
    //guardamos en esta variable el objeto inventario que devuelve este metodo y lo subimos a sesion para recuperarlo en la vista
$inventario=operaciones::listadoinventario();//objeto de tipo inventario 
$_SESSION['inventario']=$inventario;
header("Location:../vista/inventario.php");

