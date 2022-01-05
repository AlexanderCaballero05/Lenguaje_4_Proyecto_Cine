<?php
include_once '../crud/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$linea = (isset($_POST['linea'])) ? $_POST['linea'] : '';
$columna = (isset($_POST['columna'])) ? $_POST['columna'] : '';
$id_estado = (isset($_POST['id_estado'])) ? $_POST['id_estado'] : '';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['ID'])) ? $_POST['ID'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO asiento (LINEA,COLUMNA,ID_ESTADO) VALUES('$linea',  ' $columna', '$id_estado') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM asiento";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE asiento SET  LINEA='$linea',COLUMNA='$columna' ,ID_ESTADO='$id_estado'   WHERE ID='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM asiento WHERE ID='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM asiento WHERE ID='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM asiento";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;