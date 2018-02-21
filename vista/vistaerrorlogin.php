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
    <body id="centrar">
         <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
         <h1 class="error">ERROR AL INICIAR SESIÓN</h1>
        <?php
        include_once '../dao/operaciones.php';
        
      ?>
       <p><?php echo $_REQUEST['excepcion']; ?></p>
       
       
       <p><img src="../imagenes/error.png"></p>
         <p><button  id="botonerror" name="volver" value="volver al menu inicial" onClick="location.href='../vista/login.php'">Volver a Intentar</button></p>
    </body>
</html>
