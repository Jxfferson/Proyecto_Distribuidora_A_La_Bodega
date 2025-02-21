<?php

include 'conexion_be.php';

$tipo_Documento = $_POST['tipo_Documento'];
$noDoc_Usuario = $_POST['noDoc_Usuario'];
$nombre_Usuario = $_POST['nombre_Usuario'];
$apellido_Usuario = $_POST['apellido_Usuario'];
$direccion_Usuario = $_POST['direccion_Usuario'];
$telefono_Usuario = $_POST['telefono_Usuario'];
$correo_Usuario = $_POST['correo_Usuario'];
$password_Usuario = $_POST['password_Usuario'];

// Consulta para insertar datos
$query = "INSERT INTO usuario(tipo_Documento, noDoc_Usuario, nombre_Usuario, apellido_Usuario, direccion_Usuario, telefono_Usuario, correo_Usuario, password_Usuario)
VALUES ('$tipo_Documento', '$noDoc_Usuario', '$nombre_Usuario', '$apellido_Usuario', '$direccion_Usuario', '$telefono_Usuario', '$correo_Usuario', '$password_Usuario')";

$ejecutar = mysqli_query($conexion, $query);


// Mensajes de registro
if($ejecutar){

    echo '
        <script>
        
            alert("Usuario registrado correctamente");
            window.location = "../login.php"; 
        </script>';
} else {

    echo '
        <script>
            alert("Lo sentimos, no hemos podido registrar el usuario :(");
            window.location = "../login.php";
        </script>
    ';
}

// Cerrar conexión
mysqli_close($conexion);
?>