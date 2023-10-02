<!-- Abraham Caban Rios
Module 11
10/2/2023 
-->
<?php
require('fpdf.php'); // Include the FPDF library

// Database credentials
$servername = "localhost";
$username = "student1";
$password = "pass";
$database = "baseball_01";

// Create a new database connection using mysqli
$conn = new mysqli($servername, $username, $password, $database);

// Check if the connection to the database was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create a PDF object
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFillColor(152, 251, 152);
// Header function
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(10, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Hero Name', 1, 0, 'C', true);
$pdf->Cell(10, 10, 'Age', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Hero Power', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Alias', 1, 0, 'C', true);
$pdf->Cell(60, 10, 'Weakness', 1, 0, 'C', true);
$pdf->Ln();
$pdf->SetFont('Arial', 'I', 8);

// SQL query to fetch data from the 'marvel_characters' table
$sql = "SELECT * FROM marvel_characters";
$result = $conn->query($sql);
$pdf->SetFillColor(152, 251, 152);
$fill = false;

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(10, 10, $row['id'], 1, 0, 'C', $fill);
        $pdf->Cell(30, 10, $row['Hero_Name'], 1, 0, 'C', $fill);
        $pdf->Cell(10, 10, $row['age'], 1, 0, 'C', $fill);
        $pdf->Cell(40, 10, $row['Hero_Power'], 1, 0, 'C', $fill);
        $pdf->Cell(40, 10, $row['alias'], 1, 0, 'C', $fill);
        $pdf->Cell(60, 10, $row['weakness'], 1, 1, 'C', $fill);
        $fill = !$fill;
    }
} else {
    $pdf->Cell(0, 10, 'No records found.', 1);
}

// Add a footer
$pdf->SetY(-40);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, 'Page ' . $pdf->PageNo(), 0, 0, 'C');

// Output the PDF
$pdf->Output();
?>
