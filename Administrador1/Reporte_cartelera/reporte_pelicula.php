<?php

   require "conexion.php";
   require "plantilla.php";

    $sql = "SELECT p.TITULO , g.NOMBRE,  p.ANIO, p.DURACION, e.TIPO
    FROM pelicula p , genero g , clasificacion c , estado e
    where p.ID_GENERO = g.ID 
    and p.ID_CLASIFICACION = c.ID
    and p.ID_ESTADO = e.ID;";

    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 12);

    $pdf->Cell(60, 5, "TITULO", 1, 0 ,"C" );
    $pdf->Cell(40, 5, "GENERO", 1, 0, "C");
    $pdf->Cell(15, 5, "ANIO", 1, 0, "C");
    $pdf->Cell(26, 5, "DURACION", 1, 0, "C");
    $pdf->Cell(26, 5, "ESTADO", 1, 0, "C");
  
    

    $pdf->SetFont("Arial", "", 11);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(60, 5, $fila['TITULO'], 1, 0 );
        $pdf->Cell(40, 5, $fila['NOMBRE'], 1, 0, "C");
        $pdf->Cell(15, 5, $fila['ANIO'], 1, 0, "C");
        $pdf->Cell(26, 5, $fila['DURACION'], 1, 0, "C");
        $pdf->Cell(26, 5, $fila['TIPO'], 1, 0, "C");
       
       
    }
   $pdf-> Output();

  




