<?php
session_start();
require('./layout/enPagpiPag.php');
//include './Apis/barcode.php';
require 'conexion.php';


    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
        $id=7;
        
    }
    $pdf->SetFont('Courier','B',12);
    $pdf->Cell(190,10,'Detalle del pedido',0,0,'C');
    $pdf->Ln(10);
    $sql="select * from pedido where no_venta=$id";
    $resultado=$mysqli->query($sql);
    $pdf->SetFont('Courier','I',12);
    while($row=mysqli_fetch_array($resultado)){
        $pdf->Cell(25);
        $pdf->Cell(140, 10, 'No.Pedido: '.$row['id_pedido'], 0, 0, 'C', 0);
        $pdf->Ln(5);
        $pdf->Cell(190, 10, 'Nombre: '.$row['nombre'], 0, 0, 'C', 0);
        $pdf->Ln(5);
        $pdf->Cell(190, 10, 'Telefono: '.$row['telefono'], 0, 0, 'C', 0);
        $pdf->Ln(5);
        $pdf->Cell(190, 10, 'Sucursal: '.$row['sucursal'], 0, 0, 'C', 0);
    }
    $pdf->Ln(5);
    $sql ="SELECT fecha FROM venta WHERE no_venta=$id";
    $resultado=$mysqli->query($sql);
    $pdf->SetFont('Courier','I',12);
    while($row=mysqli_fetch_array($resultado)){
        $pdf->Cell(25);
        $pdf->Cell(140, 10, 'Fecha: '.$row['fecha'], 0, 0, 'C', 0);
    }
    //Codigo de barras
    
    //$pdf->WriteHTML('You can<br><p align="center">center a line</p>and add a horizontal rule:<br><hr>');
    
    $pdf->Ln(8);
    $pdf->SetFont('Courier','B',12);
    $pdf->Cell(190,10,'Linea de captura para pagar',0,0,'C');
    $pdf->Ln(15);
    $sql="select * from pedido where no_venta=$id";
    $resultado=$mysqli->query($sql);
    while($row=mysqli_fetch_array($resultado)){
        $code = $row['codigo'];
    }
    $pdf->Ln(15);
    $pdf->Image('codigos/'.$code.'.png',90,85,40);
    $pdf->Ln(20);


    //Fin codigo
    
    $pdf->SetFont('Courier','B',12);
    $pdf->Cell(190,10,'Listado de productos',0,0,'C');
    $pdf->Ln(15);
    $pdf->SetFont('Courier','B',12);
    $pdf->Cell(25);
    $pdf->Cell(20, 10, 'CodProd', 0, 0, 'C', 0);
    $pdf->Cell(50, 10, 'Nombre', 0, 0, 'C', 0);
    $pdf->Cell(30, 10, 'Cantidad', 0, 0, 'C', 0);
    $pdf->Cell(30, 10, 'Precio', 0, 0, 'C', 0);
    $pdf->Cell(20, 10, 'SubTotal', 0, 1, 'C', 0);
    
    $sql="select * from ventadetalle where id_venta=$id";
        $resultado=$mysqli->query($sql);
    $pdf->SetFont('Arial','I',12);  
    while($row=mysqli_fetch_array($resultado)){
        $pdf->Cell(25);
        $pdf->Cell(20, 10, $row['id_prod'], 0, 0, 'C', 0);
        $pdf->Cell(50, 10, $row['nombre'], 0, 0, 'C', 0);
        $pdf->Cell(30, 10, $row['cantidad'], 0, 0, 'C', 0);
        $pdf->Cell(30, 10, "$".$row['precio'], 0, 0, 'C', 0);
        $pdf->Cell(20, 10, "$".$row['sub_total'], 0, 1, 'C', 0);
    }
    $pdf->Cell(120);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40, 10, 'Total', 0, 0, 'C', 0);
    $sql="select * from venta where no_venta=$id";
    $resultado=$mysqli->query($sql);
    $pdf->SetFont('Arial','I',12);
    while($row=mysqli_fetch_array($resultado)){
        $pdf->Cell(10, 10, "$".$row['total'], 0, 1, 'C', 0);
    }
    $pdf->Ln(15);
    
    $pdf->Output('linea'.$id.'.pdf','D');
    $pdf->Output();
    
    
    
?>