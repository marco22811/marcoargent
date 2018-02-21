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
        <script src="../javascript/muestralejas.js"></script>
         <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen">
        <h1>Debe darle una ubicación nueva a la caja</h1>
          <?php
//          include_once '../dao/operaciones.php';
        include '../modelo/cajabackup.php';
        include_once '../modelo/estanteria.php';
       session_start();
       $caja=$_SESSION['objcajabackup'];// lo recuperamos del controlconfirmar
        ?>
        <form action="../controlador/controldevolvercaja.php" method="set" accept-charset="utf-8">
            
          <table border="2px">
              <tr><td colspan="2" class="titulo">Características</td><td colspan="2" class="titulo">Dimensiones</td><td colspan="2" class="titulo"> Nueva Ubicación</td><td colspan="2" class="titulo">Antigua Ubicación</td></tr>
                
                <tr><td>  Código:  </td>
                    <td><?php  echo  $caja->getCodigo(); ?></td>
                    
                    <td rowspan="2">Altura:</td>
                    <td rowspan="2"><?php  echo $caja->getAltura(); ?></td>
                    <td rowspan="3">Estanteria:</td>
                    <td rowspan="3"><select required name="estanteriacontenedora"   id="estanteriacontenedora" onChange="muestralejas(this.value)" action="../controlador/controlaltacaja.php" method="set" accept-charset="utf-8">
                            <option value=""> Elige estanteria</option>
                             <?php //include_once "../dao/conexionBBDD.php";
                               // include_once '../modelo/estanteria.php';
                                   // include '../dao/operaciones.php';
                                    //include_once '../modelo/caja.php';

                                    
                                    $arraylibres=$_SESSION["codigosestanteriaslibres"]; // lo recuperamos del controlconfirmar para ahora mostrar solamente las estanterias libres
                                     foreach ($arraylibres as $estanteria){ ?>
                                        <option value="<?php echo $estanteria->getCodigo();?>"> <?php echo $estanteria->getCodigo();?></option>
                                     <?php  } ?></select>
                    </td>
                    <td rowspan="3">Estanteria:</td>
                    <td rowspan="3"><?php  echo $caja->getCodigoestanteria();?></td>
                </tr>
                
                <tr><td>  Material:  </td>
                    <td><?php  echo $caja->getMaterial(); ?></td>
                    
                   
                    
                    
                    
                </tr>
                
                <tr><td>  Contenido:  </td>
                    <td ><?php  echo  $caja->getContenido(); ?></td>
                     <td rowspan="2">  Anchura:  </td>
                    <td rowspan="2"><?php  echo $caja->getAnchura(); ?></td>
                    
                    <tr><td>  Color:  </td>
                        <td ><?php  echo $caja->getColor(); ?></td>
                    <td rowspan="3">  Ocupar leja:  </td>
                    <td rowspan="3"><select required name="lejadelaestanteria" id="lejadelaestanteria" >
                            <option value=""> Elige leja:</option></select></td>
                    <td rowspan="3">  Leja:  </td>
                     <td rowspan="3"><?php  echo $caja->getLejaestanteria(); ?></td>
                    </tr>
                  <tr><td>  Fecha de alta:  </td>
                      <td ><?php  echo   date("d/m/Y", strtotime($caja->getFecha_alta())); ?></td>
                      <td rowspan="2"> Profundidad: </td>  
                  <td rowspan="2"> <?php   echo $caja->getProfundidad(); ?></td>
                  </tr>
                  <tr><td>  Fecha de venta:  </td>
                      <td><?php  echo date("d/m/Y", strtotime($caja->getFechadebaja())); ?></td>
            </table>    
            
            
            

   
    <button type="submit" id="añadir">Añadir</button>
   
</form>
      <button name="volver" value="Volver al menu inicial" onClick="location.href='../vista/devolucioncaja.php'">Volver </button>
    </body>
</html>
