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
         <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
        <h1>INICIA SESIÓN</h1>
        <form action="../controlador/controllogin.php" method="get" accept-charset="utf-8">
            <table border="3px" id="login">
                
                <tr><td>Nombre de usuario:</td><td><input type="text" name="usuariol" id="usuariol" value="" placeholder="" required></td></tr>
                <tr><td>Contraseña:</td><td><input type="password" name="contraseñal" id="contraseñal" value="" placeholder=""required></td></tr>
            </table>
                <button type="submit" name="enviar" value="Iniciar sesión">Iniciar sesión</button>
                
</form>
      
    </body>
</html>
