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
        <h1>¿Esta seguro de que quiere efectuar esta venta?</h1>
        
        <?php
        include '../modelo/cajabackup.php';
       session_start();
       $caja=$_SESSION['objcajabackup'];//lo recuperamos del controlconfirmar
        ?>
         <table border="3" id="caj"> 
    
         
                <tr >
			<td class="titulo2">Código caja</td>
			<td class="titulo2">Color</td>
			<td class="titulo2">Altura</td>
			<td class="titulo2">Anchura</td>
			<td class="titulo2">Profundidad</td>
			<td class="titulo2">Material</td>
                        <td class="titulo2">Contenido</td>
                        <td class="titulo2">Fecha de alta</td>
                        <td class="titulo2">Estanteria</td>
                        <td class="titulo2">leja</td>
                        <td class="titulo2">fecha de baja</td>
                                                
                </tr>
     
                <tr>                
                     <td><?php  echo  $caja->getCodigo(); ?></td>
                     <td> <?php  echo $caja->getColor(); ?></td>
                      <td><?php  echo $caja->getAltura(); ?></td>
                      <td><?php  echo $caja->getAnchura(); ?></td>
                     <td><?php   echo $caja->getProfundidad(); ?></td>
                     <td> <?php  echo $caja->getMaterial(); ?></td>
                     <td><?php  echo  $caja->getContenido(); ?></td>
                     <td><?php  echo  $caja->getFecha_alta(); ?></td>
                     <td> <?php  echo $caja->getCodigoestanteria(); ?></td>
                     <td> <?php  echo $caja->getLejaestanteria(); ?></td>
                     <td> <?php  echo $caja->getFechadebaja(); ?></td>
                      
              </tr>
 </table> 
        <form method="post" name="Aceptar" action="../controlador/controlventacaja.php">
            <button type="submit" name="Aceptar" value="Aceptar">Aceptar</button>
            <button type="button" name="Cancelar" value="Cancelar" onClick="location.href='../vista/ventacaja.php'">Cancelar</button>
        
</form>
      
        
    </body>
</html>
