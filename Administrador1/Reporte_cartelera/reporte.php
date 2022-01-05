<?php
/************************************************************
* Reporte en PDF con FPDF                                   *
*                                                           *
* Fecha:    2021-02-09                                      *
* Autor:  DIANA RUT                                      *
* Web:  www.codigosdeprogramacion.com                       *
************************************************************/

require "conexion.php";
require "plantilla.php";



  

    $sql = "SELECT  p.TITULO, s.TIPO, f.NOMBRE , a.TIPO , c.HORA_INICIO,c.HORA_FINAL, c.FECHA
    FROM cartelera c, pelicula p, sala s, formato f, audio a
    where c.ID_PELICULA = p.ID_PELICULA
    and c.ID_SALA = s.ID
    and c.ID_FORMATO = f.ID
    and c.ID_AUDIO = a.ID;";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 11);

    $pdf->Cell(50, 5, "PELICULA", 1, 0 ,"C" );
    $pdf->Cell(26, 5, "SALA", 1, 0, "C");
    $pdf->Cell(21, 5, "FORMATO", 1, 0, "C");
    $pdf->Cell(26, 5, "AUDIO", 1, 0, "C");
    $pdf->Cell(26, 5, "HORA INICIO", 1, 0, "C");
    $pdf->Cell(26, 5, "HORA FINAL", 1, 0, "C");
  
    $pdf->Cell(21, 5, "FECHA", 1, 1, "C");

    $pdf->SetFont("Arial", "", 10);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(50, 5, $fila['TITULO'], 1, 0 );
        $pdf->Cell(26, 5, $fila['TIPO'], 1, 0, "C");
        $pdf->Cell(21, 5, $fila['NOMBRE'], 1, 0, "C");
        $pdf->Cell(26, 5, $fila['TIPO'], 1, 0, "C");
        $pdf->Cell(26, 5, $fila['HORA_INICIO'], 1, 0, "C");
        $pdf->Cell(26, 5, $fila['HORA_FINAL'], 1, 0, "C");
       
        $pdf->Cell(21, 5, $fila['FECHA'], 1, 1, "C");
    }
 $pdf-> Output();


