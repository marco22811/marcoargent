<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html id="menuinicial">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">

       <img src="../imagenes/logo.png" alt="" id="logo">

<div class="example">
    <ul id="nav">
        <li ><a href="login.php">Cerrar sesión</a></li>
        <li><a>Estanterías</a>
            <ul>
                <li><a href="../vista/altaestanteria.php">Alta</a></li>
                <li><a href="../controlador/controllistaestanterias.php">Listar</a> </li>
                
            </ul>
        </li>
        <li><a >Cajas</a>
        <ul>
            <li><a href="../controlador/controlestanteriaslibres.php">Alta</a></li>
                <li><a href="../controlador/controllistacaja.php">Listar</a> </li>
                
            </ul>
        </li>
        <li><a >Gestión Almacén</a> 
        <ul>
            <li><a href="../controlador/controlinventario.php">Inventario</a></li>
            <li><a href="../vista/ventacaja.php">Venta de cajas</a> </li>
            <li><a href="../vista/devolucioncaja.php">Devolución de cajas</a> </li>
        </ul>
            </li>
        <li><a >Otros</a></li>
        
    </ul>
</div>

<img src="../imagenes/estanteria.png" alt="" id="imagenestanteria">
    </body>
</html>
