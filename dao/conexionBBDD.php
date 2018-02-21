<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
       
     $conexion=new mysqli("localhost","root","root");
      // print $conexion->server_info;
    
       
       //seleccionar base de datos
       
       $conexion->select_db("bd_almacen_mam") or die ("base de datos no encontrada");
      // echo "<h2> conexion establecida con la base de datos bd_almacen_mam</h2>";
        ?>
        
    </body>
</html>
