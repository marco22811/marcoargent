<?php
include '../dao/operaciones.php';
//recuperamos las variables que nos manda el formulario de la vista
$usuario=$_REQUEST['usuario'];
$contrasena=$_REQUEST['contraseña'];
//encriptamos la contraseña
$contrasenaencriptada=password_hash ( $contrasena, PASSWORD_BCRYPT );
//creamos un objeto usuario que tendra el nombre y la contraseña ya encriptada
$objusuario=new usuario($usuario, $contrasenaencriptada);
//intentamos realizar el registro, si todo va bien nos manda a iniciar la sesion
// si algo falla nos manda a una vista de errores y le pasamos la excepcion recogida
try {
    operaciones::registrarusuario($objusuario);
header("Location:../vista/login.php");
} catch(altaException $ce) {
    header("Location:../vista/vistaerrorregistrar.php?excepcion=$ce");
     }