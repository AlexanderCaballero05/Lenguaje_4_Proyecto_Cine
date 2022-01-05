<?php
include_once '../crud/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$primer_nombre = (isset($_POST['primer_nombre'])) ? $_POST['primer_nombre'] : '';
$segundo_nombre = (isset($_POST['segundo_nombre'])) ? $_POST['segundo_nombre'] : '';
$primer_apellido = (isset($_POST['primer_apellido'])) ? $_POST['primer_apellido'] : '';
$segundo_apellido = (isset($_POST['segundo_apellido'])) ? $_POST['segundo_apellido'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$edad = (isset($_POST['edad'])) ? $_POST['edad'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$sexo = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$fecha_nacimiento = (isset($_POST['fecha_nacimiento'])) ? $_POST['fecha_nacimiento'] : '';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';


$id = (isset($_POST['id_usuario'])) ? $_POST['id_usuario'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO PERFILUSUARIO (PRIMER_NOMBRE, SEGUNDO_NOMBRE,PRIMER_APELLIDO, SEGUNDO_APELLIDO,CORREO , EDAD, TELEFONO, DIRECCION, SEXO, CLAVE, USUARIO, FECHA_NACIMIENTO, PERFIL) 
        VALUES('$primer_nombre', '$segundo_nombre', '$primer_apellido' , '$segundo_apellido', '$correo', '$edad' , '$telefono', '$direccion', '$sexo', '$clave', '$usuario', '$fecha_nacimiento', 'administra') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM PERFILUSUARIO ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE PERFILUSUARIO  SET PRIMER_NOMBRE='$nombre'SEGUNDO_NOMBRE='$descripcion' WHERE ID_USUARIO='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT *  FROM PERFILUSUARIO  WHERE ID_USUARIO='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM PERFILUSUARIO  WHERE ID_USUARIO='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM PERFILUSUARIO WHERE perfil='administra'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;