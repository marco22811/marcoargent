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
        <h1>ALTA DE ESTANTERIAS</h1>
        <form action="../controlador/controlaltaestanteria.php" method="set" accept-charset="utf-8">
            <table border="2px">
                <tr><td colspan="2" class="titulo">Características</td><td colspan="2" class="titulo">Ubicación</td></tr>
                
                <tr><td>  Código  </td>
                    <td><input required type="text" name="codigoestanteria" id="codigoestanteria" value="" placeholder=""></td>
                    <td rowspan="2"> Pasillo  </td>
                    <td rowspan="2"><input required type="text" name="pasillo" id="pasillo" value="" placeholder=""></td>
                </tr>
                
                 <tr><td>  Material  </td>
                    <td><input required type="text" name="materialestanteria" id="materialestanteria" value="" placeholder=""></td>
                   
                    
                </tr>
                
                <tr><td>  Número de Lejas:  </td>
                    <td ><input required type="number" name="numerodelejas" id="numerodelejas" value="" placeholder="" min="1"></td>
                    <td > Número  </td>  
                    <td><input required type="number" name="numero" id="numero" value="" placeholder="" min="1"></td>
                
            </table>
                
    
       
    
    <button type="submit" id="añadir">Añadir</button>
</form>
        <button name="volver" value="volver al menu inicial" onClick="location.href='../vista/menuinicial.php'">Volver al Menú Inicial</button>
    </body>
</html>
