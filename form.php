<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribuidora a la Bodega - Contacto</title>
    <link rel="icon" href="empresa/EMPRESA.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #ecf0f1;
            --accent-color: #e74c3c;
            --text-color: #34495e;
            --background-color: #f5f5f5;
        }

        .dark-mode {
            --primary-color: #1a1a1a;
            --secondary-color: #2c2c2c;
            --accent-color: #e74c3c;
            --text-color: #f5f5f5;
            --background-color: #121212;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: background-color 0.3s, color 0.3s;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--background-color);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 50px;
        }

        nav ul {
            display: flex;
            list-style-type: none;
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: var(--accent-color);
        }

        .submenu {
            display: none;
            position: absolute;
            background-color: var(--primary-color);
            min-width: 150px;
        }

        nav ul li:hover .submenu {
            display: block;
        }

        .btn-create-account {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-create-account:hover {
            background-color: #c0392b;
        }

        .header-buttons {
            display: flex;
            align-items: center;
        }

        .theme-toggle {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            margin-left: 1rem;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .theme-toggle:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        main {
            padding-top: 80px;
        }

        .contact-form {
            background-color: var(--secondary-color);
            border-radius: 10px;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .contact-form h2 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .contact-form p {
            margin-bottom: 1rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid var(--primary-color);
            border-radius: 5px;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .form-group textarea {
            height: 150px;
        }

        .btn-submit {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
            border-radius: 5px;
        }

        .btn-submit:hover {
            background-color: #c0392b;
        }

        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0;
            margin-top: 2rem;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-section {
            flex: 1;
            margin-right: 2rem;
            margin-bottom: 1rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
        }

        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin-right: 1rem;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: var(--accent-color);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                align-items: flex-start;
            }

            nav ul {
                flex-direction: column;
                width: 100%;
            }

            nav ul li {
                width: 100%;
            }

            .submenu {
                position: static;
                display: none;
            }

            nav ul li:hover .submenu {
                display: block;
            }

            .btn-create-account {
                margin-top: 1rem;
            }

            .footer-content {
                flex-direction: column;
            }

            .footer-section {
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <div class="logo">
                <img src="empresa/EMPRESA.png" alt="Logo Distribuidora a la Bodega">
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li>
                        <a href="#">Productos ▼</a>
                        <ul class="submenu">
                            <li><a href="lacteosquesos.php">Lácteos</a></li>
                            <li><a href="carnes.php">Carnes</a></li>
                            <li><a href="jamones.php">Jamones</a></li>
                            <li><a href="embutidos.php">Embutidos</a></li>
                        </ul>
                    </li>
                    <li><a href="form.php">Contacto</a></li>
                </ul>
            </nav>
            <div class="header-buttons">
                <button class="btn-create-account" onclick="logoutAlert(event)">Cerrar sesión</button>
                &nbsp;&nbsp;&nbsp;&nbsp;<button class="theme-toggle" onclick="toggleTheme()" aria-label="Cambiar tema">
                    <i class="fas fa-moon"></i>
                </button>
            </div>
        </div>
    </header>

    <main>
        <div class="container">
            <section class="contact-form">
                <h2>Formulario de Contacto</h2>
                <p><b>En este apartado podrás enviarnos un mensaje acerca de algún problema, duda o sugerencia en nuestro sistema.</b></p>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required placeholder="Ingresa tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" id="email" name="email" required placeholder="Ingresa tu correo electrónico">
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" required placeholder="Ingresa tu mensaje"></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Enviar</button>
                </form>
            </section>
        </div>
    </main>

    <footer>
        <div class="container footer-content">
            <div class="footer-section">
                <h3>Sobre Nosotros</h3>
                <p>Somos una empresa dedicada al envío de Salsamentarías a todo Bogotá!</p>
            </div>
            <div class="footer-section">
                <h3>Nuestras Redes</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>¿Cómo encontrarnos?</h3>
                <p><i class="fas fa-map-marker-alt"></i> Dirección: </p>
                <p><i class="fas fa-phone"></i> Teléfono: </p>
                <p><i class="fas fa-envelope"></i> Correo: </p>
            </div>
        </div>
        <div class="footer-bottom">
            <small>&copy; 2023 <b>Distribuidora a la Bodega</b> - Todos los derechos reservados</small>
        </div>
    </footer>
    //Agregamos la funciòn de cambio de tema y alertas con SWEETALERT
    <script>
        function logoutAlert(event) {
            event.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Quieres crear una cuenta?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, crear cuenta'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';
                }
            });
        }

        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
            const themeIcon = document.querySelector('.theme-toggle i');
            if (document.body.classList.contains('dark-mode')) {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            } else {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const header = document.querySelector('header');
            const headerHeight = header.offsetHeight;

            window.addEventListener('scroll', () => {
                if (window.scrollY > headerHeight) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
        });
    </script>

</body>
</html>