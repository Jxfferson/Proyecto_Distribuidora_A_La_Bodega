<?php

session_start();

if (isset($_SESSION['correo_Usuario'])) {
    header("location: index.php");
}

?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="icon" href="empresa/EMPRESA.png">
    <link rel="stylesheet" href="login/login.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
    <!--Login-->
    <form action="PHP/login_usuario.php" method="POST" class="formulario__login">
        <h2>Iniciar Sesión</h2>
        <input type="email" placeholder="Correo Electronico" name="correo_Usuario">
        <input type="password" placeholder="Contraseña" name="password_Usuario">
        <button>Entrar</button>
    </form>
    <!--Register-->
    <form action="PHP/registro_usuario_be.php" method="POST" class="formulario__register">
        <h2>Registrarse</h2>
        <input type="text" placeholder="Tipo Documento" name="tipo_Documento">
        <input type="text" placeholder="Documento" name="noDoc_Usuario">
        <input type="text" placeholder="Nombre" name="nombre_Usuario">
        <input type="text" placeholder="Apellido" name="apellido_Usuario">
        <input type="text" placeholder="Direccion" name="direccion_Usuario">
        <input type="text" placeholder="Telefono" name="telefono_Usuario">
        <input type="email" placeholder="Correo Electronico" name="correo_Usuario">
        <input type="password" placeholder="Contraseña" name="password_Usuario">
        <button id="btn-register" onclick="ThanksReg()">Registrar</button>
    </form>
</div>

        </main>

        <script src="login/javascript.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<script src="sweetalert/swal.js"></script>
</body>
</html>