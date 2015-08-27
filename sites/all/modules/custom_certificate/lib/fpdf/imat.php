<?php
require_once('fpdf.php');
require_once('fpdi.php');



$pdf = new FPDI();
$pdf->AddPage();

//Set the source PDF file
$pagecount = $pdf->setSourceFile("modified_pdf.pdf");

//Import the first page of the file
$tpl = $pdf->importPage(1);


//Use this page as template
// use the imported page and place it at point 20,30 with a width of 170 mm
$pdf->useTemplate($tpl);

#Print Hello World at the bottom of the page

//$pdf->Rotate(90);
//$pdf->Image('avior_logo.png',500,240,20,20);
//x, y width, heigh
//$pdf->Image('avior_logo.png', 13, 12, 35, 30);
$pdf->Image('test.jpeg', 166, 9, 28, 25);

//$pdf->Write(0, "Hello W	orld");


$pdf->SetDrawColor(0,80,180);
$pdf->SetTextColor(0, 158, 224);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(75);
$pdf->Cell(1, 10,'Hello World!');
$pdf->Output();


// $pdf->Output("modified_pdf.pdf", "F");
?>
