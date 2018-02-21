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
       	     <h1>ALTA DE CAJAS</h1>
        <form action="../controlador/controlaltacaja.php" method="set" accept-charset="utf-8">
            
          <table border="2px">
              <tr><td colspan="2" class="titulo">Características</td><td colspan="2" class="titulo">Dimensiones</td><td colspan="2" class="titulo">Ubicación</td></tr>
                
                <tr><td>  Código  </td>
                    <td><input required type="text" name="codigocaja" id="codigocaja" value="" placeholder=""></td>
                    
                    <td rowspan="2">Altura:</td>
                    <td rowspan="2"><input required type="number" name="altura" id="altura" value="" placeholder="" min="1"></td>
                    <td rowspan="3">Estanteria:</td>
                    <td rowspan="3"><select required name="estanteriacontenedora"   id="estanteriacontenedora" onChange="muestralejas(this.value)" >
                            <option value=""> Elige estanteria</option>
                             <?php //include_once "../dao/conexionBBDD.php";
                                //include_once '../modelo/estanteria.php';
                                    include '../dao/operaciones.php';
                                    //include_once '../modelo/caja.php';

                                    session_start();  
                                    $arraylibres=$_SESSION["codigosestanteriaslibres"];
                                     foreach ($arraylibres as $estanteria){ ?>
                                        <option value="<?php echo $estanteria->getCodigo();?>"> <?php echo $estanteria->getCodigo();?></option>
                                     <?php  } ?></select>
                    </td>
                </tr>
                
                <tr><td>  Material  </td>
                    <td><input required type="text" name="material" id="material" value="" placeholder=""></td>
                    
                   
                    
                    
                    
                </tr>
                
                <tr><td>  Contenido:  </td>
                    <td ><input  required type="text" name="contenido" id="contenido" value="" placeholder=""></td>
                     <td rowspan="2">  Anchura  </td>
                    <td rowspan="2"><input required type="number" name="anchura" id="anchura" value="" placeholder="" min="1"></td>
                    
                    <tr><td>  Color:  </td>
                        <td ><input required type="color" name="colorcaja" id="colorcaja" value="" placeholder=""></td>
                    <td rowspan="2">  Ocupar leja  </td>
                    <td rowspan="2"><select required name="lejadelaestanteria" id="lejadelaestanteria" >
                            <option value=""> Elige leja</option></select></td>
                    </tr>
                  <tr><td>  Fecha de alta:  </td>
                      <td ><?php echo date("d")."/".date("m")."/".date("Y");?></td>
                  <td > Profundidad </td>  
                    <td> <input required type="number" name="profundidad" id="profundidad" value="" placeholder="" min="1"></td>
                  </tr>
            </table>    
            
            
            

   
    <button type="submit" id="añadir">Añadir</button>
   
</form>
       <button name="volver" value="Volver al menu inicial" onClick="location.href='../vista/menuinicial.php'">Volver al Menú Inicial</button>       
    </body>
</html>
