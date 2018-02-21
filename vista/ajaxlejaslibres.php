<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
 //include_once '../modelo/estanteria.php';
include '../dao/operaciones.php';
include'../dao/conexionBBDD.php';
//include_once '../modelo/caja.php';
 //session_start();

?>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title></title>
 </head>
 <body>
     
     
<?php
//OBTENEMOS LA VARIABLE Origen
 $codigoestanteria=$_REQUEST['estanteriacontenedora'];


    
            
     $sql="SELECT * FROM estanteria WHERE codigo='$codigoestanteria'";
      $resultado=$conexion->query($sql); 
$estanteriaseleccionada=$resultado->fetch_array();
        


$arraylejas= operaciones::lejasdisponibles($estanteriaseleccionada);



foreach($arraylejas as $leja){

?>
 <option value="<?php echo $leja?>"><?php echo $leja?> </option>
<?php
}

?>


 </body>
</html>