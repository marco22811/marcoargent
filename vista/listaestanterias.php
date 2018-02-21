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
        <h1>Listado De estanterias</h1>
			<table border='3px'>
				
					<tr >
						<th class="titulo">Código</th>
						<th class="titulo">Material</th>
						<th class="titulo">Número de lejas</th>
						<th class="titulo">Lejas ocupadas</th>
						<th class="titulo">Pasillo</th>
						<th class="titulo">Nº de pasillo</th>

					</tr>


				
				

        <?php
      
         //include_once "../dao/conexionBBDD.php";
    include '../modelo/estanteria.php';
//include_once '../dao/operaciones.php';
 session_start();
            
           //recuperamos el array que guardamos en el controllistaestanterias y mostramos los datos con codigo embebido
                
                $array_resultado= $_SESSION['listaestanterias'];  ?>               
                
                
              <?php  foreach ($array_resultado as $fila) { ?>
                   <tr >
                       
                      <td><?php  echo  $fila->getCodigo(); ?></td>
                     <td> <?php  echo $fila->getMaterial(); ?></td>
                      <td><?php  echo $fila->getNlejas(); ?></td>
                      <td><?php  echo $fila->getLejasocupadas(); ?></td>
                     <td><?php   echo $fila->getPasillo(); ?></td>
                     <td> <?php  echo $fila->getNpasillo(); ?></td>
                      
                    </tr>
                     
               <?php } ?>
           
                
            
        
        
    
        
        </table>
        <button name="volver" value="volver al menu inicial" onClick="location.href='../vista/menuinicial.php'">Volver al Menú Inicial</button>
    </body>
</html>
        
  
