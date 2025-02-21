<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribuidora a la Bodega</title>
    <link rel="stylesheet" href="../estilos/style.css">
    <link rel="icon" href="../empresa/EMPRESA.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Todos los links de CND's -->
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="../login/alerts.js"></script>
</head>
<body>
    <hr>
    <header class="header">
        <div class="logo">
            <img src="../empresa/EMPRESA.png" class="logonav">
        </div>
        <div class="interior">
                <nav class="navegacion">
                  <ul>
                    <li><a href="index_admin.php">Inicio</a></li>
                    
                    <li class="submenu">
                        <a href="#">Productos  ▼</a>
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
              </div>
              <a class="button" id="btn-logout" onclick="logoutAdmin(event)"><button>Salir</button></a>          
     </header>

    <hr>
<center>
        <h2 class="circulos">Formulario de Contacto</h2>
    </center> 
    <br>
    <div class="Formulario">
           <div class="container-form">
            <div class="info-form">
                <h1>Contactanos</h1>
                <p><b>En este apartado podras enviarnos un mensaje acerca de algun problema, duda o sugerencia en nuestro sistemas.</b></p>
            </div>
            <form action="#" method="post">
                <input type="text" id="nombre" name="nombre" required placeholder="Ingresa tu nombre" class="campo">
                <input type="email" id="email" name="email" required placeholder="Ingresa tu correo electronico" class="campo">
                <textarea id="mensaje" name="mensaje" required placeholder="Ingresa tu mensaje"></textarea>
                <input type="submit" value="Enviar" class="btn-enviar">
            </form>
           </div>
</div>
<center>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <br>

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
              <p>Somos una empresa dedicada al envio de Salsamentarias a todo Bogota!</p>
              <h2>Nuertras Redes</h2>
               <p>
				<img src="" ><ion-icon name="logo-facebook"></ion-icon>&nbsp;&nbsp; Facebook &nbsp;
				<img src="" > <ion-icon name="logo-twitter"></ion-icon>&nbsp;&nbsp; Twitter &nbsp;
				<img src="" ><ion-icon name="logo-instagram"></ion-icon>&nbsp;&nbsp; Instragram</p>
              </div>
             <div class="caja">
              <h2>¿Cómo encontrarnos?</h2>
               <p><img src=""><ion-icon name="navigate-outline"></ion-icon>  <em>Dirección: <b></b> <br>
                <img src=""><ion-icon name="call-outline"></ion-icon>  Teléfono: <b></b> <br>
               <img src=""><ion-icon name="send-outline"></ion-icon>   Correo: <b></b></br></em></p>
             </div>
        </div>
    </div>
    <div class="grupo2">
        <small>&copy; 2023 <b>Distribuidora a la Bodega</b> - Todos los derechos reservados - </small>
    </div>
 </footer>
</header>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<script src="../login/alerts.js"></script>
</body>
</html>
