<?php
include_once '../crud/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : '';
$id_genero = (isset($_POST['id_genero'])) ? $_POST['id_genero'] : '';
$id_clasificacion = (isset($_POST['id_clasificacion'])) ? $_POST['id_clasificacion'] : '';
$signosis = (isset($_POST['signosis'])) ? $_POST['signosis'] : '';
$anio = (isset($_POST['anio'])) ? $_POST['anio'] : '';
$imagen = (isset($_POST['imagen'])) ? $_POST['imagen'] : '';
$duracion = (isset($_POST['duracion'])) ? $_POST['duracion'] : '';
$id_estado = (isset($_POST['id_estado'])) ? $_POST['id_estado'] : '';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['ID_PELICULA'])) ? $_POST['ID_PELICULA'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO PELICULA (TITULO,ID_GENERO,ID_CLASIFICACION,
        SIGNOSIS,ANIO,IMAGEN,DURACION,ID_ESTADO) 
        VALUES('$titulo', '$id_genero','$id_clasificacion', '$signosis' ,'$anio' , '$imagen', '$duracion', '$id_estado') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
       
    case 2:        
        $consulta = "UPDATE PELICULA SET TITULO='$titulo', ID_GENERO='$id_genero' , ID_CLASIFICACION='$id_clasificacion', 
         SIGNOSIS='$signosis',ANIO='$anio', 'IMAGEN'='$imagen' DURACION='$duracion',ID_ESTADO='$id_estado'
         WHERE ID_PELICULA='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM PELICULA WHERE ID_PELICULA='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM PELICULA WHERE ID_PELICULA='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT p.ID_PELICULA, p.TITULO , g.NOMBRE, c.descripcion, p.SIGNOSIS, p.ANIO, p.IMAGEN, p.DURACION, e.TIPO
        FROM pelicula p , genero g , clasificacion c , estado e
        where p.ID_GENERO = g.ID 
        and p.ID_CLASIFICACION = c.ID
        and p.ID_ESTADO = e.ID
";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;