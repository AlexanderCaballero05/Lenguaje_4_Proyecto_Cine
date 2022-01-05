<?php
include_once '../crud/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$nombre1 = (isset($_POST['Primer_nombre'])) ? $_POST['Primer_nombre'] : '';
$nombre2 = (isset($_POST['segundo_nombre'])) ? $_POST['segundo_nombre'] : '';
$apellido1 = (isset($_POST['primer_apellido'])) ? $_POST['primer_apellido'] : '';
$apellido2= (isset($_POST['segundo_apellido'])) ? $_POST['segundo_apellido'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$edad = (isset($_POST['edad'])) ? $_POST['edad'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$sexo = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
$clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$nacimiento = (isset($_POST['fecha_nacimiento'])) ? $_POST['fecha_nacimiento'] : '';


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['ID_USUARIO'])) ? $_POST['ID_USUARIO'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO PerfilUsuario (PRIMER_NOMBRE,SEGUNDO_NOMBRE,PRIMER_APELLIDO,SEGUNDO_APELLIDO,
        CORREO,EDAD,TELEFONO, DIRECCION, SEXO, CLAVE, USUARIO, FECHA_NACIMIENTO , PERFIL) 
        VALUES('$nombre1', '$nombre2,'$apellido1', '$apellido2' ,'$correo' , '$edad', '$telefono', '$direccion','$sexo','$clave','$usuario','$nacimiento','administra' ) ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM PerfilUsuario ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;  

    case 2:
       
        $consulta = "SELECT ID_USUARIO, PRIMER_NOMBRE, PRIMER_APELLIDO, CORREO, TELEFONO, PERFIL
        From PerfilUsuario WHERE perfil='administra'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;