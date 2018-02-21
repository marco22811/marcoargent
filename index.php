<?php

//aqui compruebo que no haya ningun usuario registrado en la base de datos, si no hay ninguno nos manda a la vista para registrarnos

include 'dao/conexionBBDD.php';
global $conexion;
$sql="SELECT * FROM usuario";
global $conexion;
$resultado=$conexion->query($sql);
if($resultado->num_rows==0){
  header("Location:vista/registro.php");  
    
}
//en el caso de que haya alguno nos manda a la vista del login
else{header("Location:vista/login.php");}


