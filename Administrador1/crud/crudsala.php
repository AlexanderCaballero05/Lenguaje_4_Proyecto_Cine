<?php
include_once '../crud/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$tipo = (isset($_POST['tipo'])) ? $_POST['tipo'] : '';
$id_estado = (isset($_POST['id_estado'])) ? $_POST['id_estado'] : '';
$canti_asientos = (isset($_POST['canti_asientos'])) ? $_POST['canti_asientos'] : '';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO sala (TIPO, ID_ESTADO,CANTI_ASIENTOS) VALUES('$tipo', '$id_estado','$canti_asientos') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM sala";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE sala SET  TIPO='$tipo',ID_ESTADO='$id_estado' ,CANTI_ASIENTOS='$canti_asientos'  WHERE ID='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT *  FROM sala  WHERE ID='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM sala WHERE ID='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM sala";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;