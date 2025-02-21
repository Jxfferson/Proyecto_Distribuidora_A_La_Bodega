<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribuidora a la Bodega</title>
    <link rel="stylesheet" href="styleadm.css">
    <link rel="stylesheet" href="../estilos/carro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="../empresa/EMPRESA.png">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="../login/alerts.js"></script>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="../empresa/EMPRESA.png" class="logonav">
        </div>
        <nav class="navegacion">
            <ul>
                <li><a href="index_admin.php">Inicio</a></li>
                <li class="submenu">
                    <a href="#">Productos ▼</a>
                    <ul class="hijos">
                        <li><a href="lacteosquesosadm.php">Lacteos</a></li>
                        <li><a href="carnesadm.php">Carnes</a></li>
                        <li><a href="jamonesadm.php">Jamones</a></li>
                        <li><a href="embutidosadm.php">Embutidos</a></li>
                    </ul>
                </li>
                <li><a href="formadm.php">Contacto</a></li>
                <li><a href="../CRUD/crudadm.php">Usuarios</a></li>
            </ul>
        </nav>
        <a class="button" id="btn-logout" onclick="logoutAdmin()"><button>Salir</button></a>
    </header>

    <center>
        <h2 class="circulos">Lacteos</h2>
    </center>
    <br>
    <center>
    <?php 
    include '../PHP/conexion_be.php';
    echo '<section class="contenedor">';
    echo '<div class="contenedor-items">';
    
    $sql = $conexion->query("SELECT * FROM producto");
    while($data = $sql->fetch_object()) { 
    ?>
        <div class="item">
            <span class="titulo-item"><?= $data->descrip_Producto?></span> <br>
            <img src="lacteos/mantequilla.png" alt="" class="img-item">
            <span class="precio-item">$<?= number_format($data->precio_Producto, 0, ',', '.') ?></span>
            <button class="boton-item">Agregar al Carrito</button>
        </div>
    <?php 
    } 
    echo '</div>';
    ?>
    
    <!-- Carrito de Compras -->
    <div class="carrito" id="carrito">
        <div class="header-carrito">
            <h2>Tu Carrito</h2>
        </div>
        <div class="carrito-items"></div>
        <div class="carrito-total">
            <div class="fila">
                <strong>Tu Total</strong>
                <span class="carrito-precio-total">$0</span>
            </div>
            <button class="btn-pagar" id="btn-pay" onclick="ThanksPay()">Pagar <i class="fa-solid fa-bag-shopping"></i></button>
        </div>
    </div>

    <?php 
    echo '</section>';
    ?>

    <footer class="piedepagina">
        <div class="grupo1">
            <div class="caja">
                <figure>
                    <a href="#">
                        <img src="../empresa/EMPRESA.png" class="logo">
                    </a>
                </figure>
            </div>
            <div class="caja">
                <h2>&nbsp;&nbsp;&nbsp;<img src=""><ion-icon name="people-outline"></ion-icon>&nbsp;Sobre Nosotros</h2>
                <p>Somos una empresa dedicada al envío de Salsamentarias a todo Bogotá!</p>
                <h2>Nuestras Redes</h2>
                <p>
                    <img src="" ><ion-icon name="logo-facebook"></ion-icon>&nbsp;&nbsp; Facebook &nbsp;
                    <img src="" > <ion-icon name="logo-twitter"></ion-icon>&nbsp;&nbsp; Twitter &nbsp;
                    <img src="" ><ion-icon name="logo-instagram"></ion-icon>&nbsp;&nbsp; Instagram
                </p>
            </div>
            <div class="caja">
                <h2>¿Cómo encontrarnos?</h2>
                <p>
                    <img src=""><ion-icon name="navigate-outline"></ion-icon>  <em>Dirección: <b>Calle 25 # 10 33 | Chia.</b> <br>
                    <img src=""><ion-icon name="call-outline"></ion-icon>  Teléfono: <b>+57 3143390341</b> <br>
                    <img src=""><ion-icon name="send-outline"></ion-icon>   Correo: <b>Maryluzdiazavila@gmail.com </b></br></em>
                </p>
            </div>
        </div>
        <div class="grupo2">
            <small>&copy; 2023 <b>Distribuidora a la Bodega</b> - Todos los derechos reservados - </small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="../login/alerts.js"></script>
    <script src="../estilos/js.js"></script>
</body>
</html>
