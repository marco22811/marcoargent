<?php
include '../modelo/usuario.php';
include '../dao/operaciones.php';
//recuperamos el usuario y la contraseña que se ha introducido en el login.php
$usuario=$_REQUEST['usuariol'];
$contrasena=$_REQUEST['contraseñal'];
//creamos el objeto usuario
$objusuario=new usuario($usuario, $contrasena);
//intentamos realizar el iniciodesesion, si todo va bien nos manda a el menuinicial
// si algo falla nos manda a una vista de errores para el login con un boton de volver a intentarlo hasta que sea correcta
try {
    $resultado=operaciones::iniciarsesion($objusuario);
header("Location:../vista/menuinicial.php");
} catch(buscarException $ce) {
    header("Location:../vista/vistaerrorlogin.php?excepcion=$ce");
     }


    



