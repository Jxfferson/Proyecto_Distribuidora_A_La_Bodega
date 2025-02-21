<?php
include("conection.php");
$con = conectarDB();

if (!$con) {
    die("Error de conexión: " . mysqli_connect_error());
}

$Id_Usuario = isset($_GET["id"]) ? $_GET["id"] : null;

if (!$Id_Usuario) {
    die("Error: No se proporcionó un ID de usuario válido.");
}

$Id_Usuario = mysqli_real_escape_string($con, $Id_Usuario);

$sql = "DELETE FROM usuario WHERE Id_Usuario = '$Id_Usuario'";
if (mysqli_query($con, $sql)) {
    header("Location: crudadm.php");
    exit();
} else {
    echo "Error al eliminar el usuario: " . mysqli_error($con);
}

mysqli_close($con);
?>