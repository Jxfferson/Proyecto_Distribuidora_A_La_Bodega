<?php
session_start();
include 'conexion_be.php';

if (isset($_POST['correo_Usuario']) && isset($_POST['password_Usuario'])) {
    $correo_Usuario = $_POST['correo_Usuario'];
    $password_Usuario = $_POST['password_Usuario'];

    $_SESSION['correo_Usuario'] = $correo_Usuario;

    $consulta = "SELECT * FROM usuario WHERE correo_Usuario=? AND password_Usuario=?";
    $stmt = mysqli_prepare($conexion, $consulta);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $correo_Usuario, $password_Usuario);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);

        if ($resultado) {
            $filas = mysqli_fetch_array($resultado);

            if ($filas) {
                if ($filas['idRol_UsuarioFK'] == 101) {
                    header("location: ../admnpag/index_admin.php");
                    exit();
                } elseif ($filas['idRol_UsuarioFK'] == 103) {
                    header("location: ../index.php");
                    exit();
                }
            } else {
                header("location: ../login.php"); // Redirigir a la página de login
                exit();
            }

            mysqli_free_result($resultado); // Liberar el recurso $resultado
        } else {
            echo "Error al ejecutar la consulta SQL";
        }
    } else {
        echo "Error al preparar la consulta SQL";
    }
} else {
    
}

mysqli_close($conexion);
?>