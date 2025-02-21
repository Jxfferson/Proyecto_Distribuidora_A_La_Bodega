<?php 
    include("conection.php");
    $con=conectarDB();

    $noDoc_Usuario=$_GET["noDoc_Usuario"];

    $sql="SELECT * FROM usuario WHERE noDoc_Usuario='$noDoc_Usuario'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
  <div class="users-form">
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
    </form>
    </div>
    <?php ?>
</body>
</html>