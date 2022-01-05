<?php
include_once '../crud/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$id_pelicula = (isset($_POST['id_pelicula'])) ? $_POST['id_pelicula'] : '';
$id_sala = (isset($_POST['id_sala'])) ? $_POST['id_sala'] : '';
$id_formato = (isset($_POST['id_formato'])) ? $_POST['id_formato'] : '';
$id_audio = (isset($_POST['id_audio'])) ? $_POST['id_audio'] : '';
$hora_inicio = (isset($_POST['hora_inicio'])) ? $_POST['hora_inicio'] : '';
$hora_final = (isset($_POST['hora_final'])) ? $_POST['hora_final'] : '';
$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['ID_CARTELERA'])) ? $_POST['ID_CARTELERA'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO cartelera (ID_PELICULA,ID_SALA,ID_FORMATO,ID_AUDIO,
        HORA_INICIO,HORA_FINAL,FECHA, PRECIO) 
        VALUES('$id_pelicula', '$id_sala','$id_formato', '$id_audio' ,'$hora_inicio' , '$hora_final', '$fecha', '$precio') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM CARTELERA";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    

    case 2:        
        $consulta = "UPDATE CARTELERA SET ID_PELICULA='$id_pelicula', ID_SALA='$id_sala' , ID_FORMATO='$id_formato', 
         ID_AUDIO='$signosis',HORA_INICIO='$hora_inicio', HORA_FINAL='$hora_final', FECHA='$fecha', PRECIO='$precio'
         WHERE ID_CARTELERA='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT *  FROM cartelera WHERE ID_CARTELERA='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM CARTELERA WHERE ID_CARTELERA='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT c.ID_CARTELERA , p.TITULO, s.TIPO AS SALA1, f.NOMBRE , a.TIPO , c.HORA_INICIO, c.HORA_FINAL, c.FECHA, c.PRECIO
        FROM cartelera c, pelicula p, sala s, formato f, audio a
        where c.ID_PELICULA = p.ID_PELICULA
        and c.ID_SALA = s.ID
        and c.ID_FORMATO = f.ID
        and c.ID_AUDIO = a.ID";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;