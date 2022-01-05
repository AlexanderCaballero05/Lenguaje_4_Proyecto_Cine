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



  

    $sql = "SELECT  c.FECHA, f.ID_FACTURA , p.TITULO, f.CAN_BOLETO , c.PRECIO, f.SUBTOTAL,f.TOTAL
    from factura f, cartelera c , pelicula p
    where f.ID_CARTELERA = c.ID_CARTELERA
    and c.ID_PELICULA = p.ID_PELICULA;";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 11);

    $pdf->Cell(25, 5, "FECHA", 1, 0 ,"C" );
    $pdf->Cell(26, 5, "FACTURA", 1, 0, "C");
    $pdf->Cell(50, 5, "PELICULA", 1, 0, "C");
    $pdf->Cell(26, 5, "BOLETOS", 1, 0, "C");
    $pdf->Cell(26, 5, "PRECIO", 1, 0, "C");
    $pdf->Cell(26, 5, "SUBTOTAL", 1, 0, "C");
  
    $pdf->Cell(21, 5, "TOTAL", 1, 1, "C");

    $pdf->SetFont("Arial", "", 10);

    while ($fila = $resultado->fetch_assoc()) {
        $pdf->Cell(25, 5, $fila['FECHA'], 1, 0 );
        $pdf->Cell(26, 5, $fila['ID_FACTURA'], 1, 0, "C");
        $pdf->Cell(50, 5, $fila['TITULO'], 1, 0, "C");
        $pdf->Cell(26, 5, $fila['CAN_BOLETO'], 1, 0, "C");
        $pdf->Cell(26, 5, $fila['PRECIO'], 1, 0, "C");
        $pdf->Cell(26, 5, $fila['SUBTOTAL'], 1, 0, "C");
       
        $pdf->Cell(21, 5, $fila['TOTAL'], 1, 1, "C");
    }
 $pdf-> Output();


