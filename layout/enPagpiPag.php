<?php
require('./fpdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('./img/logo.png',20,8,33);
        $this->SetFont('Courier','I',12);
        $this->Cell(110);
        $this->Cell(60,10,'Grupo Zorrito S.A. de C.V.',0,0,'C');
        $this->Ln(30);
        
    }

function Footer()
{
    
    $this->SetY(-15);
    $this->SetFont('Courier','I',12);
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

?>