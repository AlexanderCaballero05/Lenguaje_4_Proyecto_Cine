<?php
include_once '../crud/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$Id_cartelera = (isset($_POST['id_cartelera'])) ? $_POST['id_cartelera'] : '';
$precio = (isset($_POST['precio'])) ? $_POST['precio'] : '';
$can_boleto = (isset($_POST['can_boleto'])) ? $_POST['can_boleto'] : '';
$subtotal = (isset($_POST['subtotal'])) ? $_POST['subtotal'] : '';
$cargo = (isset($_POST['subtotal'])) ? $_POST['subtotal'] : '';
$total = (isset($_POST['total'])) ? $_POST['total'] : '';



$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$id = (isset($_POST['ID_FATURA'])) ? $_POST['ID_FACTURA'] : '';


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
       
        $consulta = "SELECT  c.FECHA, f.ID_FACTURA , f.CLIENTE, p.TITULO, c.PRECIO , f.CAN_BOLETO , f.SUBTOTAL, f.CARGO ,f.TOTAL
        from factura f, cartelera c , pelicula p
        where f.ID_CARTELERA = c.ID_CARTELERA
        and c.ID_PELICULA = p.ID_PELICULA";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;

}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;