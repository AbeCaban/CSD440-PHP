<?php
// Include the FPDF library
require('fpdf.php');

// Create a new PDF document
$pdf = new FPDF();

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', 'B', 16);

// Your simple sentence
$sentence = "This is a simple sentence in a PDF document.";

// Output the sentence to the PDF
$pdf->Cell(0, 10, $sentence, 0, 1);

// Output the PDF to the browser or save it to a file
$pdf->Output('simple_sentence.pdf', 'D');
?>
