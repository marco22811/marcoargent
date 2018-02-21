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
        <h1>Listado De Cajas</h1>
			<table border='3px'>
				
					<tr>
						<th class="titulo">Código</th>
						<th class="titulo">Color</th>
						<th class="titulo">Altura</th>
						<th class="titulo">Anchura</th>
						<th class="titulo">Profundidad</th>
						<th class="titulo">Material</th>
                                                <th class="titulo">Contenido</th>
                                                <th class="titulo">Fecha de alta</th>

					</tr>


				
				

        <?php
      
      
        include '../modelo/caja.php';
 session_start();
            
           //recogemos el array de cajas de el controlllistacaja
                
                $array_resultado= $_SESSION['listacajas'];  ?>               
                
                
              <?php  foreach ($array_resultado as $fila) { ?>
                   <tr>
                       
                      <td><?php  echo  $fila->getCodigo(); ?></td>
                     <td> <?php  echo $fila->getColor(); ?></td>
                      <td><?php  echo $fila->getAltura(); ?></td>
                      <td><?php  echo $fila->getAnchura(); ?></td>
                     <td><?php   echo $fila->getProfundidad(); ?></td>
                     <td> <?php  echo $fila->getMaterial(); ?></td>
                     <td><?php  echo  $fila->getContenido(); ?></td>
                     <td><?php  echo date("d/m/Y", strtotime($fila->getFecha_alta())); ?></td>
                      
                    </tr>
                     
               <?php } ?>
          
                
            
        
        
    
        
        </table>
       <button name="volver" value="volver al menu inicial" onClick="location.href='../vista/menuinicial.php'">Volver al Menú Inicial</button>
    </body>
</html>
        

