<?php







require "conexion.php";
require "plantilla.php";



  

    $sql = "SELECT  c.FECHA, f.ID_FACTURA , f.CLIENTE, p.TITULO, c.HORA_INICIO, c.ID_SALA ,  c.PRECIO, f.CAN_BOLETO , f.SUBTOTAL, f.CARGO ,f.TOTAL
    from factura f, cartelera c , pelicula p
    where f.ID_CARTELERA = c.ID_CARTELERA
    and c.ID_PELICULA = p.ID_PELICULA";
    $resultado = $mysqli->query($sql);

    $pdf = new PDF("P", "mm", "letter");
    $pdf->AliasNbPages();
    $pdf->SetMargins(10, 10, 10);
    $pdf->AddPage();

    
    $pdf->SetFont("Arial", "B", 11);
    $pdf->Cell(22, 5, "CLIENTE:",0 );
    if($fila = $resultado->fetch_assoc()) {
        $pdf->SetFont("Arial", "", 11);
        $pdf->Cell(25, 5, $fila['CLIENTE'], 0);
    }

    $pdf->Cell(25);
    $pdf->SetFont("Arial", "B", 11);
    $pdf->Cell(140, 20, "DATOS DE LA COMPRA:", 0 );
    $pdf->Ln(10);

    $pdf->Cell(26, 18, "HORA INICIO:", 0);
    if($fila = $resultado->fetch_assoc()) {
        $pdf->SetFont("Arial", "", 10);
        $pdf->Cell(25, 18, $fila['HORA_INICIO'], 0);
    }
    $pdf->Ln(10);
    $pdf->SetFont("Arial", "B", 11);
    $pdf->Cell(26, 15, "PELICULA:", 0);
    if($fila = $resultado->fetch_assoc()) {
        $pdf->SetFont("Arial", "", 10);
        $pdf->Cell(25, 15, $fila['TITULO'], 0);
    }
    $pdf->Ln(10);

    $pdf->SetFont("Arial", "B", 11);
    $pdf->Cell(26, 10, "CANTIDAD BOLETOS:", 0);
    if($fila = $resultado->fetch_assoc()) {
        $pdf->SetFont("Arial", "", 10);
        $pdf->Cell(25, 10, $fila['CAN_BOLETO'],);
    }
    $pdf->Ln(10);

    $pdf->SetFont("Arial", "B", 11);
    $pdf->Cell(20, 5, "PRECIO:",);
    if($fila = $resultado->fetch_assoc()) {
        $pdf->SetFont("Arial", "", 10);
        $pdf->Cell(25, 5, $fila['PRECIO'],);
    }
    $pdf->Ln(10);

   
    $pdf->SetFont("Arial", "B", 11);
    $pdf->Cell(23, 5, "RECARGO:", 0);
    if($fila = $resultado->fetch_assoc()) {
        $pdf->SetFont("Arial", "", 10);
        $pdf->Cell(25, 5, $fila['CARGO'],);
    }

    $pdf->Ln(10);









    
  
    

 

   
 $pdf-> Output();


