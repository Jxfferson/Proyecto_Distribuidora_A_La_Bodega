<?php
include 'conection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tipo_Documento = $_POST["tipo_Documento"];
  $noDoc_Usuario = $_POST["noDoc_Usuario"];
  $nombre_Usuario = $_POST["nombre_Usuario"];
  $apellido_Usuario = $_POST["apellido_Usuario"];
  $direccion_Usuario = $_POST["direccion_Usuario"];
  $telefono_Usuario = $_POST["telefono_Usuario"];
  $correo_Usuario = $_POST["correo_Usuario"];
  $password_Usuario = $_POST["password_Usuario"];

  $connect = conectarDB();
  $query = "INSERT INTO usuario (tipo_Documento, noDoc_Usuario, nombre_Usuario, apellido_Usuario, direccion_Usuario, telefono_Usuario, correo_Usuario, password_Usuario) VALUES ('$tipo_Documento', '$noDoc_Usuario', '$nombre_Usuario', '$apellido_Usuario', '$direccion_Usuario', '$telefono_Usuario', '$correo_Usuario', '$password_Usuario')";
  mysqli_query($connect, $query);
  mysqli_close($connect);

  header("Location: crudadm.php");
  exit;
}
?>