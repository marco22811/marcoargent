<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of operaciones
 *
 * @author Marco
 */
  include "../dao/conexionBBDD.php";
    include '../modelo/estanteria.php';
    include '../modelo/estanteriaconcajas.php';
     include '../modelo/inventario.php';
         include_once '../modelo/usuario.php';
//include_once '../dao/operaciones.php';
include '../modelo/caja.php';
include '../modelo/cajaconleja.php';
include '../modelo/ocupacion.php';
include '../modelo/altaException.php';
include '../modelo/buscarException.php';
include '../modelo/cajabackup.php';



class operaciones {
    
    public function anadirestanteria($_objestanteria) {  //funcion que recibe un objeto de tipo estanteria y la añade a la base de datos
        $codigo=$_objestanteria->getCodigo();
        $material=$_objestanteria->getMaterial();
        $numerolejas=$_objestanteria->getNlejas();
        $pasillo=$_objestanteria->getPasillo();
        $npasillo=$_objestanteria->getNpasillo();
        global $conexion;
        
        //aqui utilizamos sentencias preparadas para hacer el alta de estanterias
        $sql=$conexion->prepare("INSERT INTO estanteria(codigo,material,n_lejas,pasillo,n_pasillo)VALUES(?,?,?,?,?)");
        $sql->bind_param("ssiss",$codigo,$material,$numerolejas,$pasillo,$npasillo);
        $resultado=$sql->execute();
        
           if ($resultado){}
           
           else{
                 if ($conexion->errno ==1062){//preguntamos si el codigo de error es este para que el mensaje sea personalizado
                            $numerror=$conexion->errno;
                            $descrerror="No ha podido añadirse el registro. Ya existe una estanteria con ese codigo o esa ubicación ya esta ocupada";
                            throw new altaException($descrerror,$numerror);
                 }else{ 
                            $numerror=$conexion->errno;
                            $descrerror=$conexion->error;
                            //echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
                            throw new altaException($descrerror,$numerror);
                         }
        
          
            }
        $conexion->close();
    }

public function listarestanterias() { //funcion que devuelve un array de objetos estanteria

    global $conexion;
    $listarestanterias=array();//creamos un array
    $sql="SELECT * FROM estanteria";
    $resultado=$conexion->query($sql);
    if($resultado->num_rows>0){ //comprobamos que exista alguna
        $dimension=$resultado->num_rows;
 
        for($i=0;$i<$dimension;$i++)   {
            $fila[]=$resultado->fetch_array();  //en un array fila guardamos una fila cada vez que se entre al for
            //creamos un objeto estanteria con cada uno de los valores de la fila y guardamos el objeto en un array que posteriormente devolvemos
            $listarestanterias[]=new estanteria($fila[$i]['codigo'], $fila[$i]["material"], $fila[$i]["n_lejas"], $fila[$i]["pasillo"], $fila[$i]["n_pasillo"], $fila[$i]["lejas_ocupadas"]);
        }
        
    return $listarestanterias;
     }
  }
  
  public function estanteriaslibres(){//funcion utilizada para mostrar solamente los codigos de las estanterias libres en la vista del alta de caja y en la vista de confirmar devolución. Devuelve un array con las estanterias libres.
      
  
      global $conexion;
      $estanteriaslibres=array();
      $sql="SELECT * FROM estanteria WHERE lejas_ocupadas < n_lejas";
      $resultado=$conexion->query($sql);
      
              if($resultado->num_rows>0){
                $dimension=$resultado->num_rows;

                for($i=0;$i<$dimension;$i++)   {
                 $fila[]=$resultado->fetch_array();//cada fila de la consulta lo guardamos en fila que contendra cada uno de sus datos  
                 $estanteriaslibres[]=new estanteria($fila[$i]['codigo'], $fila[$i]["material"], $fila[$i]["n_lejas"], $fila[$i]["pasillo"], $fila[$i]["n_pasillo"],$fila[$i]["lejas_ocupadas"]);
                }
              return $estanteriaslibres;
      
              }
  }
  
  
 
  
public function lejasdisponibles($estanteriaseleccionada) {//funcion utilizada en el ajax que devuelve un array con las lejas libres en las que se puede almacenar una caja:
    //recibe un objeto estanteria
    global $conexion;
    $idestanteria=$estanteriaseleccionada['id'];

    $sql2="SELECT leja_ocupada FROM ocupacion WHERE id_estanteria='$idestanteria'";
    $consulta2=$conexion->query($sql2);
    $arraylejasocupadas=array();
    $dimension=$consulta2->num_rows;
    //creamos un array del numero de campos que nos devuelve la consulta y añadimos el dato de cada posicion de la consulta a el array
    for($i=0;$i<$dimension;$i++){
        $fila=$consulta2->fetch_array();
        $arraylejasocupadas[]=$fila['leja_ocupada'];
    } 
    //ahora tenemos un array de las lejas ocupadas y tenemos que sacar las libres
    $arraydisponibles=array();
    $lejasquetienelaestanteria=$estanteriaseleccionada['n_lejas'];//guardamos las lejas que tiene la estanteria

    if (sizeof($arraylejasocupadas)<$lejasquetienelaestanteria) {// preguntamos si hay menos lejas ocupadas que lejas tiene la estanteria
       for($j=1;$j<=$lejasquetienelaestanteria;$j++) {
           if(!in_array($j,$arraylejasocupadas)) {// si la leja j no esta en el array de lejas ocupadas la añadimos a disponibles
               $arraydisponibles[]=$j; 
           } 
       }
    }
 
    return $arraydisponibles;
  
}

  
  public function anadircaja($objcaja){ //funcion que recibe un objeto caja y lo añade a la base de datos en la tabla caja
      
        $codigo=$objcaja->getCodigo();
        $color=$objcaja->getColor();
        $altura=$objcaja->getAltura();
        $anchura=$objcaja->getAnchura();
        $profundidad=$objcaja->getProfundidad();
        $material=$objcaja->getMaterial();
        $contenido=$objcaja->getContenido();
        $fecha_altamal=$objcaja->getFecha_alta();
        $fecha_alta = date("Y/m/d", strtotime($fecha_altamal));//usamos strtotimr para darle el formato a la fecha que acepta la base de datos
        
        $ordensql="INSERT INTO caja(codigo,color,altura,anchura,profundidad,material,contenido,fecha_alta) VALUES('$codigo','$color',$altura,$anchura,$profundidad,'$material','$contenido','$fecha_alta')";
        global $conexion;
        $resultado=$conexion->query($ordensql);
        if ($resultado){}
        else{
                if ($conexion->errno ==1062){
                            $numerror=$conexion->errno;
                            $descrerror="No ha podido añadirse el registro Ya existe una caja con ese codigo</h2>";
                            throw new altaException($descrerror,$numerror);
                }
                else{
                            
                            $numerror=$conexion->errno;
                            $descrerror=$conexion->error;
                            $descrerror=$descrerror." EN AÑADIR CAJA";
                            //echo "Se ha producido un error nº $numerror que corresponde a: $descrerror  <br>";
                            throw new altaException($descrerror,$numerror);
                }
        }
        
           //$conexion->close(); 
  } 
 
  public function anadirocupacion($objocupacion) { //funcion que recibe un objeto ocupación y los inserta en la base de datos 
  //si se inserta bien entonces actualiza las lejas ocupadadas de esa estanteria
      global $conexion;
      $idcaja=$objocupacion->getIdcaja();
      $idestanteria=$objocupacion->getIdestanteria();
      $leja=$objocupacion->getLejaocupada();
      $ordensql="INSERT INTO ocupacion(id_estanteria,leja_ocupada,id_caja) VALUES($idestanteria,$leja,$idcaja)";
        
      $resultado=$conexion->query($ordensql);
        
         if ($resultado){
               
                 $sql="UPDATE estanteria SET lejas_ocupadas=lejas_ocupadas+1 WHERE id='$idestanteria'";
                 $resultado=$conexion->query($sql);
                 
                 
         }
         else{
             $numerror=$conexion->errno;
             $descrerror=$conexion->error;
             $descrerror=$descrerror." EN AÑADIR AÑADIR OCUPACION";
             throw new altaException($descrerror,$numerror);
         }
     
                 
       //$conexion->close();
  }
  public function dameid($codigo,$tabla){// funcion que te devuelve el id a partir del codigo y de la tabla en la que se encuentra de la base de datos 
      // es necesario para crear el objeto ocupacion despues de añadir la caja ya que lo hacen metodos distitos
     global $conexion;
     $sql2="SELECT id FROM $tabla WHERE codigo='$codigo'";
     $consulta2=$conexion->query($sql2);
     $fila=$consulta2->fetch_array();
     $id=$fila['id'];
     return $id;
  }
  
  
public function listarcajas() { //funcion que devuelve un array de objetos caja de las cajas que tenemos
      //mismo proceso que para listar estanterias

    global $conexion;
    $listarcajas=array();
    $sql="SELECT * FROM caja";
    $resultado=$conexion->query($sql);
    if($resultado->num_rows>0){
        $dimension=$resultado->num_rows;
 
        for($i=0;$i<$dimension;$i++)   {
            $fila[]=$resultado->fetch_array();  
            $listarcajas[]=new caja($fila[$i]['codigo'], $fila[$i]["color"], $fila[$i]["altura"], $fila[$i]["anchura"], $fila[$i]["profundidad"],$fila[$i]["material"],$fila[$i]["contenido"],$fila[$i]["fecha_alta"]);
         }
        return $listarcajas;
    }
  }
  
  public function listadoinventario() {//devuelve un objeto de tipo inventario que contiene un array de objetos de tipo estanteriaconcajas

      global $conexion;
      $sql="SELECT * FROM estanteria ORDER BY pasillo,n_pasillo";
      $resultado=$conexion->query($sql);
      
      $fechadehoy=date("d")."/".date("m")."/".date("Y");
      
      $arraydeestanterias=array();
      foreach ($resultado as $fila) {//este bucle recorre cada una de las estanterias
          $arraydecajas=array();
          $idestanteria=$fila['id'];
          $sql2="SELECT * FROM ocupacion WHERE id_estanteria='$idestanteria'";
          $resultado2=$conexion->query($sql2);
          foreach ($resultado2 as $fila2) {//este bucle recorre cada una de las ocupaciones que se han hecho en esta estanteria
           
             
             $idcaja=$fila2['id_caja'];
             $leja=$fila2['leja_ocupada'];
             $sql3="SELECT * FROM caja WHERE id='$idcaja'";
             $resultado3=$conexion->query($sql3);
             $filacaja=$resultado3->fetch_array();
             //añadimos a el array de cajas todas las cajas que ocupen una leja en esa estanteria y lo hacemos creando cajasconlejas para saber donde estan ubicadas
             $arraydecajas[]=new cajaconleja($filacaja['codigo'], $filacaja['color'], $filacaja['altura'], $filacaja['anchura'], $filacaja['profundidad'], $filacaja['material'], $filacaja['contenido'], $filacaja['fecha_alta'], $leja);

          }
          //creamos un nuevo objeto estanteria con cajas 
          $objestanteria=new estanteriaconcajas($fila['codigo'], $fila['material'], $fila['n_lejas'], $fila['pasillo'], $fila['n_pasillo'], $fila['lejas_ocupadas'],$arraydecajas);
          
          //añadimos a el array de estanterias el objeto estanteria con cajas
          array_push($arraydeestanterias,$objestanteria );
        
         
      }
      //creamos un objeto inventario con la fecha de hoy y el array de estanterias con cajas con leja
      $objinventario=new inventario($fechadehoy,$arraydeestanterias);
      
      return $objinventario;
  }

  public function datoscajabackup($codigo) {//funcion que recibe un codigo y a partir de el muestra los datos de la caja y donde se encuentra
      //lo usamos para confirmar si queremos vender una caja
      global $conexion;
      $sql="SELECT * FROM caja WHERE codigo='$codigo'"; 
      $resultado=$conexion->query($sql);
      if($resultado->num_rows>0){
        $filacaja=$resultado->fetch_array();
      
        //sacamos la fecha de hoy
         $fechadebaja=date("d")."/".date("m")."/".date("Y");
         //necesitamos el id de la caja y de la estanteria
         $idcaja=$filacaja["id"];
         //sacamos la estanteria (id) y la leja en la que esta colocada
      
         $sql2="SELECT * FROM ocupacion WHERE id_caja='$idcaja'";
         $resultado2=$conexion->query($sql2);
         $filaocupacion=$resultado2->fetch_array();
         $idestanteria=$filaocupacion['id_estanteria'];
          $lejaestanteria=$filaocupacion["leja_ocupada"];
          //sacamos el coigo de la estanteria en la que esta colocada
          $sql3="SELECT codigo FROM estanteria WHERE id='$idestanteria'";
          $consulta3=$conexion->query($sql3);
          $filaestanteria=$consulta3->fetch_array();
          $codigoestanteria=$filaestanteria['codigo'];
      
          //creamos un objeto cajabackup con los datos que hemos recuperado anteriormente
          $objcajabackup=new cajabackup($codigo, $filacaja['color'], $filacaja['altura'], $filacaja['anchura'], $filacaja['profundidad'], $filacaja['material'], $filacaja['contenido'], $filacaja['fecha_alta'],$codigoestanteria,$lejaestanteria,$fechadebaja);
          return $objcajabackup;
          
      }
      else{ 
          $descrerror="No existe ninguna caja con ese código";
          throw new buscarException($descrerror);        
      }
  }
  public function vendercaja($codigo) {//funcion que borra una caja de la base de datos (se ejecuta el trigger creado en la base de datos que lo inserta en cajabackup lo borra la ocupacion y actualiza lejas)
      global $conexion;
      $sql="DELETE FROM caja WHERE codigo='$codigo'";
      $conexion->query($sql);
  }
  
  public function datoscajadevuelta($codigo){//funcion que a partir del codigo devuelve un objeto con todos los datos de la caja backup para despues mostrarla
      
      global $conexion;
      $sql="SELECT * FROM backup_caja WHERE codigo='$codigo'"; 
      $resultado=$conexion->query($sql);
      if($resultado->num_rows>0){
         $filacajabackup=$resultado->fetch_array();
         $objcaja=new cajabackup($filacajabackup["codigo"], $filacajabackup["color"], $filacajabackup["altura"], $filacajabackup["anchura"], $filacajabackup["profundidad"], $filacajabackup["material"], $filacajabackup["contenido"], $filacajabackup["fecha_alta"],$filacajabackup["estanteria"],$filacajabackup["leja"],$filacajabackup["fecha_baja"]);
         return $objcaja;
   
       }
       else{
                            $descrerror="No se ha vendido ninguna caja con ese código";
                            throw new buscarException($descrerror);}
  
        }
  
public function devolvercaja($codigo,$estanteria,$leja) { 
    //funcion que recibe el codigo la estanteria estanteria y la nueva ubicación. 
    //crea un trigger que cada vez que borremos de cajabackup nos inserta en caja, en ocupacion y nos actualiza las lejas ocupadas de la estanteria
    global $conexion;
    //comprobamos si existe y si es asi lo borramos para crear el nuevo con la nueva ubicacion
    $borrar="DROP TRIGGER IF EXISTS cajabackup_before_delete;";
     $conexion->query($borrar);
     //creamos el trigger
    $disparador="CREATE TRIGGER `cajabackup_before_delete` BEFORE DELETE ON `backup_caja` FOR EACH ROW 
        
BEGIN

INSERT INTO caja  
VALUES(NULL,OLD.codigo,OLD.color,OLD.altura,OLD.anchura,OLD.profundidad,OLD.material,OLD.contenido,OLD.fecha_alta);

INSERT INTO ocupacion(id_estanteria,leja_ocupada,id_caja) VALUES((SELECT id FROM estanteria WHERE codigo='$estanteria'),'$leja',(SELECT id FROM CAJA WHERE codigo='$codigo'));

UPDATE estanteria SET lejas_ocupadas=lejas_ocupadas+1 WHERE id=(SELECT id_estanteria FROM ocupacion WHERE id_caja=(SELECT id FROM CAJA WHERE codigo='$codigo'));




END";
    //montamos una transaccion con la creacion del trigger y la orden delete que borra de caja backup
    $conexion->autocommit(false);
    try {

    $conexion->query($disparador);
    
      $sql="DELETE FROM backup_caja WHERE codigo='$codigo'";
      $conexion->query($sql);
      $conexion->commit();
      
      } catch (Exception $exc) {
       $conexion->rollback();
    }
}

public function registrarusuario($objusuario) { 
////funcion que recibe un objeto usuario y lo inserta en la base de datos 
//si alguno de los campos es incorrecto nos lanza una excepcion que recogemos en el catch que llama a este metodo
    global $conexion;
    $usuario=$objusuario->getUsuario();
    $contrasena=$objusuario->getContrasena();
    
    $sql="INSERT INTO usuario VALUES(NULL,'$usuario','$contrasena')";
    $resultado=$conexion->query($sql);
    if ($resultado) { 
        
    }
    else  {$numerror=$conexion->errno;
                            $descrerror=$conexion->error;                           
                            throw new altaException($descrerror,$numerror);}
    
    
}
  
  
  public function iniciarsesion($objusuario) {
//funcion que recibe un objeto usuario y comprueba con la base de datos que el usuario y la contraseña sean los mismos

    global $conexion;
    $usuario=$objusuario->getUsuario();
    $contrasena=$objusuario->getContrasena();
    
    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
    $resultado=$conexion->query($sql);
    $fila=$resultado->fetch_array();
    if($resultado->num_rows==1){//si hay un campo con ese nombre de usuario comprueba que la contraseña sea correcta
        if(password_verify($contrasena,$fila['password'])){}
        else {$descrerror="Contraseña Incorrecta";throw new buscarException($descrerror);}//si la contraseña no es la misma crea una excepcion
    }
    else{$descrerror="Usuario Incorrecto";throw new buscarException($descrerror); //si el usuario no existe crea una excepcion
           
            } 
                            
                            
    }

    
  
  
  
  
  
  
  
  
  

  
  
  

  
  
   
}