<?php
require('fpdf.php');
include ('../conection.php');

$con = conectarDB(); // Asigna el resultado de la función a una variable

$pdf = new FPDF();


$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 25, 'Reporte de Usuarios', 0, 1, 'C');



$pdf->SetFont('Arial', '', 11);

// Establece el ancho de cada columna
$widths = array(8, 18, 25, 25, 25, 35, 25, 40, 30);

// Imprime el encabezado de la tabla
$pdf->Cell($widths[0], 9, 'ID', 1, 0, 'C');
$pdf->Cell($widths[1], 9, 'Tipo Doc', 1, 0, 'C');
$pdf->Cell($widths[2], 9, 'Numero Doc', 1, 0, 'C');
$pdf->Cell($widths[3], 9, 'Nombre', 1, 0, 'C');
$pdf->Cell($widths[4], 9, 'Apellidos', 1, 0, 'C');
$pdf->Cell($widths[5], 9, 'Direccion', 1, 0, 'C');
$pdf->Cell($widths[6], 9, 'Telefono', 1, 0, 'C');
$pdf->Cell($widths[7], 9, 'Correo Electronico', 1, 0, 'C');
$pdf->Cell($widths[8], 9, 'Contraseña', 1, 0, 'C');
$pdf->Ln();

// Consulta a la base de datos para obtener los usuarios
$query = mysqli_query($con, "SELECT * FROM usuario");
while ($row = mysqli_fetch_array($query)) {
    $pdf->Cell($widths[0], 9, $row['Id_Usuario'], 1, 0, 'C');
    $pdf->Cell($widths[1], 9, $row['tipo_Documento'], 1, 0, 'C');
    $pdf->Cell($widths[2], 9, $row['noDoc_Usuario'], 1, 0, 'C');
    $pdf->Cell($widths[3], 9, $row['nombre_Usuario'], 1, 0, 'C');
    $pdf->Cell($widths[4], 9, $row['apellido_Usuario'], 1, 0, 'C');
    $pdf->Cell($widths[5], 9, $row['direccion_Usuario'], 1, 0, 'C');
    $pdf->Cell($widths[6], 9, $row['telefono_Usuario'], 1, 0, 'C');
    $pdf->Cell($widths[7], 9, $row['correo_Usuario'], 1, 0, 'C');
    $pdf->Cell($widths[8], 9, $row['password_Usuario'], 1, 0, 'C');
    $pdf->Ln();
}

$pdf->Output('reporte_usuarios.pdf', 'I');
?>

