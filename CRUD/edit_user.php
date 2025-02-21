<?php

include("conection.php");
$con = conectarDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
    $tipo_Documento = $_POST["tipo_Documento"];
    $nombre_Usuario = $_POST["nombre_Usuario"];
    $apellido_Usuario = $_POST["apellido_Usuario"];
    $direccion_Usuario = $_POST["direccion_Usuario"];
    $telefono_Usuario = $_POST["telefono_Usuario"];
    $correo_Usuario = $_POST["correo_Usuario"];
    $password_Usuario = $_POST["password_Usuario"];
    $noDoc_Usuario = $_POST["noDoc_Usuario"];

    $sql = "UPDATE usuario SET tipo_Documento='$tipo_Documento', nombre_Usuario='$nombre_Usuario', apellido_Usuario='$apellido_Usuario', direccion_Usuario='$direccion_Usuario', telefono_Usuario='$telefono_Usuario', correo_Usuario='$correo_Usuario', password_Usuario='$password_Usuario' WHERE noDoc_Usuario='$noDoc_Usuario'";$query = mysqli_query($con, $sql);

if($query){
    Header("Location: crudadm.php");
}else{

}



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos/carro.css">
</head>
<body>
  
    <form action="edit_user.php" method="POST">
        <input type="text" placeholder="Documento" name="noDoc_Usuario" value="<?= $row['noDoc_Usuario']?>">
        <input type="text" placeholder="Tipo de Documento" name="tipo_Documento" value="<?= $row['tipo_Documento']?>">
        <input type="text" placeholder="Nombre" name="nombre_Usuario" value="<?= $row['nombre_Usuario']?>">
        <input type="text" placeholder="Apellido" name="apellido_Usuario" value="<?= $row['apellido_Usuario']?>">
        <input type="text" placeholder="Direccion" name="direccion_Usuario" value="<?= $row['direccion_Usuario']?>">
        <input type="text" placeholder="Telefono" name="telefono_Usuario" value="<?= $row['telefono_Usuario']?>">
        <input type="email" placeholder="Correo Electronico" name="correo_Usuario" value="<?= $row['correo_Usuario']?>">
        <input type="password" placeholder="Contraseña" name="password_Usuario" value="<?= $row['password_Usuario']?>">

        <input type="submit" value="Actualizar">
    <?php ?>
</body>
</html>



