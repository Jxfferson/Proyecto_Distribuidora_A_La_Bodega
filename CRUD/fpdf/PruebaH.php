
    
<?php

require('fpdf.php');
include ('../conection.php');

$con = conectarDB(); // Asigna el resultado de la función a una variable

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {


      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('Distribuidora a la Bodega'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : Calle 25 # 10 33 | Chia. "), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : +57 3143390341 "), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(180);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : Maryluzdiazavila@gmail.com "), 0, 0, '', 0);
      $this->Ln(5);


      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(39, 40, 41, 1);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE USUARIOS"), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(39, 40, 41, 1); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(17, 10, utf8_decode('ID'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Tipo Doc'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Num Doc'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Apellido'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Dirección'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('Telefono'), 1, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Correo Electronico'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

$query = mysqli_query($con, "SELECT * FROM usuario");
while ($row = mysqli_fetch_array($query))

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde


$i = $i + 1;
/* TABLA */
$query = mysqli_query($con, "SELECT * FROM usuario");
while ($row = mysqli_fetch_array($query)){
$pdf->Cell(17, 10, $row['Id_Usuario'], 1, 0, 'C', 0);
$pdf->Cell(20, 10, $row['tipo_Documento'], 1, 0, 'C', 0);
$pdf->Cell(35, 10, $row['noDoc_Usuario'], 1, 0, 'C', 0);
$pdf->Cell(35, 10, $row['nombre_Usuario'], 1, 0, 'C', 0);
$pdf->Cell(35, 10, $row['apellido_Usuario'], 1, 0, 'C', 0);
$pdf->Cell(40, 10, $row['direccion_Usuario'], 1, 0, 'C', 0);
$pdf->Cell(40, 10, $row['telefono_Usuario'], 1, 0, 'C', 0);
$pdf->Cell(60, 10, $row['correo_Usuario'], 1, 1, 'C', 0);
}




$pdf->Output('Reporte_Usuarios.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
