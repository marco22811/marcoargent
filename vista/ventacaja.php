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
       	     <h1>VENTA DE CAJAS</h1>
             <form action="../controlador/controlconfirmar.php?opcion=venta" method="post" accept-charset="utf-8">
                  <table border="3px" id="venta">
                
                      <tr><td >Codigo de la caja a vender:</td><td><input type="text" name="codigovender" id="codigovender" value="" placeholder=""></td></tr>
              
            </table>
               
    
    <button type="submit" id="vender">Vender</button>
    </form>
           <button name="volver" value="volver al menu inicial" onClick="location.href='../vista/menuinicial.php'">Volver al Menú Inicial</button>
    </body>
</html>
