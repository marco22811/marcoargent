<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html id="paginventario">
   
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
        <h1>INVENTARIO</h1>
			

        <?php
      
       //  include_once "../dao/conexionBBDD.php";
   // include_once '../modelo/estanteria.php';
   // include_once '../modelo/inventario.php';
include '../dao/operaciones.php';
 session_start();

        $objinventario=$_SESSION['inventario'];//recuperamos el objeto inventario subido en el controlinventario
                
                ?> 
                
               
              <h2>Fecha: <?php  echo  $objinventario->getFecha(); ?></h2>     
        
      <?php //recorremos el array de estanterias y mostramos los datos de cada una de ellas
          foreach ($objinventario->getEstanteriaconcaja() as $estanteria){?>
                <table border="3" id="estan"> 
                    <tr >
						<th><h2>Código Estanteria</h2></th>
						<th ><h2>Material</h2></th>
						<th><h2>Número de lejas</h2></th>
						<th><h2>Lejas ocupadas</h2></th>
						<th><h2>Pasillo</h2></th>
                                                <th ><h2>Nº de pasillo</h2></th>
                                               
                                                
					</tr>
                  <tr>
                       
                      <th><?php  echo  $estanteria->getCodigo(); ?></th>
                     <th> <?php  echo $estanteria->getMaterial(); ?></th>
                      <th><?php  echo $estanteria->getNlejas(); ?></th>
                      <th><?php  echo $estanteria->getLejasocupadas(); ?></th>
                     <th><?php   echo $estanteria->getPasillo(); ?></th>
                     <th > <?php  echo $estanteria->getNpasillo(); ?></th>
                      
                    </tr>
                    </table>
                    <?php
                    //recorremos el array de cajas que contiene cada estanteria y mostramos todos los datos que necesitamos
     foreach ($estanteria->getArraydecajas() as $caja) { ?>
              <table border="3" id="caj"> 
    
         
          <tr>
						<td><h4>Código caja</h4></td>
						<td><h4>Color</h4></td>
						<td><h4>Altura</h4></td>
						<td><h4>Anchura</h4></td>
						<td><h4>Profundidad</h4></td>
						<td><h4>Material</h4></td>
                                                <td><h4>Contenido</h4></td>
                                                <td><h4>Fecha de alta</h4></td>
                                                <td><h4>Leja</h4></td>
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
                      <td><?php  echo  $caja->getLeja(); ?></td>
              </tr>
				
                                   
                    
                    
                   
                    
                    
                                              
                   
                    </table>     
                 <?php } ?>   
                   
              <br><br>
                    <?php } ?>
                       
           
         
           
         <button name="volver" value="volver al menu inicial" onClick="location.href='../vista/menuinicial.php'">Volver al Menú Inicial</button>     
            
        
        
    
        
        
    </body>
</html>
