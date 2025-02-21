<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Distribuidora a la Bodega</title>
<link rel="icon" href="empresa/EMPRESA.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        gap: 2rem;
    }

    .logo img {
        height: 50px;
    }

    .navegacion {
        display: flex;
        align-items: center;
    }

    nav ul {
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        list-style: none;
    }

    nav ul li {
        position: relative;
        list-style-type: none;
    }

    nav ul li a {
        color: white;
        text-decoration: none;
        padding: 10px 15px;
        display: block;
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

    .theme-toggle {
        background-color: transparent;
        border: none;
        color: white;
        font-size: 1.5rem;
        cursor: pointer;
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

    .contenedor {
        display: flex;
        justify-content: space-between;
        padding: 2rem 0;
    }

    .contenedor-items {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 2rem;
        width: 60%;
        transition: .3s;
    }

    .item {
        background-color: var(--secondary-color);
        border-radius: 10px;
        padding: 1rem;
        text-align: center;
        transition: transform 0.3s;
    }

    .item:hover {
        transform: translateY(-5px);
    }

    .img-item {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 1rem;
    }

    .titulo-item {
        font-weight: bold;
        margin-bottom: 0.5rem;
        display: block;
    }

    .precio-item {
        font-weight: bold;
        color: var(--accent-color);
        margin-bottom: 1rem;
        display: block;
    }

    .boton-item {
        background-color: var(--accent-color);
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .boton-item:hover {
        background-color: #c0392b;
    }

    .carrito {
        border: 1px solid var(--primary-color);
        width: 35%;
        margin-top: 30px;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: auto;
        position: sticky !important;
        top: 0;
        transition: .3s;
        /* Oculto por defecto */
        margin-right: -100%;
        opacity: 0;
    }

    .carrito .header-carrito {
        background-color: var(--primary-color);
        color: #fff;
        text-align: center;
        padding: 30px 0;
    }

    .carrito .carrito-item {
        display: flex;
        align-items: center;
        position: relative;
        border-bottom: 1px solid var(--secondary-color);
        padding: 20px;
    }

    .carrito .carrito-item img {
        margin-right: 20px;
    }

    .carrito .carrito-item .carrito-item-titulo {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .carrito .carrito-item .selector-cantidad {
        display: inline-block;
        margin-right: 25px;
    }

    .carrito .carrito-item .carrito-item-cantidad {
        border: none;
        font-size: 18px;
        background-color: transparent;
        display: inline-block;
        width: 30px;
        padding: 5px;
        text-align: center;
    }

    .carrito .carrito-item .selector-cantidad i {
        font-size: 18px;
        width: 32px;
        height: 32px;
        line-height: 32px;
        text-align: center;
        border-radius: 50%;
        border: 1px solid var(--text-color);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .carrito .carrito-item .selector-cantidad i:hover {
        color: #3498db;
        border-color: #3498db;
    }

    .carrito .carrito-item .carrito-item-precio {
        font-weight: bold;
        display: inline-block;
        font-size: 18px;
        margin-bottom: 5px;
    }

    .carrito .carrito-item .btn-eliminar {
        position: absolute;
        right: 15px;
        top: 15px;
        color: var(--accent-color);
        font-size: 20px;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        border-radius: 50%;
        border: 1px solid var(--accent-color);
        cursor: pointer;
        display: block;
        background: transparent;
        z-index: 20;
        transition: all 0.3s ease;
    }

    .carrito .carrito-item .btn-eliminar:hover {
        color: #e74c3c;
        border-color: #e74c3c;
        transform: scale(1.1);
    }

    .carrito .carrito-item .btn-eliminar i {
        pointer-events: none;
    }

    .carrito-total {
        background-color: var(--secondary-color);
        padding: 30px;
        color: var(--text-color);
    }

    .dark-mode .carrito-total {
        background-color: var(--secondary-color);
        color: var(--text-color);
    }

    .dark-mode .carrito-total .fila {
        color: var(--text-color);
    }

    .carrito-total .fila {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .carrito-total .btn-pagar {
        display: block;
        width: 100%;
        border: none;
        background: var(--accent-color);
        color: #fff;
        border-radius: 5px;
        font-size: 18px;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        transition: .3s;
    }

    .carrito-total .btn-pagar:hover {
        scale: 1.05;
    }

    @media screen and (max-width: 850px) {
        .contenedor {
            flex-direction: column;
        }
        .contenedor-items {
            width: 100% !important;
        }
        .carrito {
            width: 100%;
        }
    }

    footer {
        background-color: var(--primary-color);
        color: white;
        padding: 2rem 0;
        margin-top: 2rem;
        width: 100%;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        padding: 0 1rem;
    }

    .footer-section {
        margin-bottom: 1rem;
    }

    .footer-section h3 {
        margin-bottom: 1rem;
        font-size: 1.2rem;
    }

    .footer-section p {
        margin-bottom: 0.5rem;
    }

    .social-icons {
        display: flex;
        gap: 1rem;
    }

    .social-icons a {
        transition: color 0.3s ease;
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
        .footer-content {
            grid-template-columns: 1fr;
        }
    }
    .contenedor-items {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* Changed to always show 4 columns */
        gap: 2rem;
        width: 100%;
        transition: .3s;
    }

    @media screen and (max-width: 1200px) {
        .contenedor-items {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media screen and (max-width: 900px) {
        .contenedor-items {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media screen and (max-width: 600px) {
        .contenedor-items {
            grid-template-columns: repeat(1, 1fr);
        }
    }

</style>
</head>
<body>
<header>
    <div class="container header-content">
        <div class="logo">
            <img src="empresa/EMPRESA.png" alt="Logo Distribuidora a la Bodega" class="logonav">
        </div>
        <nav class="navegacion">
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li class="submenu">
                    <a href="#">Productos ▼</a>
                    <ul class="hijos">
                        <li><a href="lacteosquesos.php">Lácteos</a></li>
                        <li><a href="carnes.php">Carnes</a></li>
                        <li><a href="jamones.php">Jamones</a></li>
                        <li><a href="embutidos.php">Embutidos</a></li>
                    </ul>
                </li>
                <li><a href="form.php">Contacto</a></li>
            </ul>
        </nav>
        <div>
            <button class="btn-create-account" onclick="logoutAlert(event)">Cerrar sesión</button>
            &nbsp;&nbsp;&nbsp;&nbsp;<button class="theme-toggle" onclick="toggleTheme()" aria-label="Cambiar tema">
                <i class="fas fa-moon"></i>
            </button>
        </div>
    </div>
</header>

<main class="container">
   
<section class="contenedor">
        <!-- Contenedor de elementos -->
        <div class="contenedor-items">
            <div class="item">
                <span class="titulo-item">Lomo</span> <br>
                <img src="jamones/lomo.png" alt="" class="img-item">
                <span class="precio-item">$ 14.450</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Mortadela</span> <br>
                <img src="jamones/mortadela.png" alt="" class="img-item">
                <span class="precio-item">$ 9.990</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Pechuga de pollo</span> <br>
                <img src="jamones/pechugadepollo.png" alt="" class="img-item">
                <span class="precio-item">$ 13.000</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <div class="item">
                <span class="titulo-item">Pavo</span> <br>
                <img src="jamones/pechugapavo.png" alt="" class="img-item">
                <span class="precio-item">$ 16.200</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            <center>
            <div class="item">
                <span class="titulo-item">Salami</span> <br>
                <img src="jamones/salamipeperoni.png" alt="" class="img-item">
                <span class="precio-item">$ 7.800</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
            </center>
            <div class="item">
                <span class="titulo-item">Jamon serrano</span> <br>
                <img src="jamones/serrano.png" alt="" class="img-item">
                <span class="precio-item">$ 16.200</span>
                <button class="boton-item">Agregar al Carrito</button>
            </div>
        </div>
    

        <!-- Carrito de Compras -->
        <div class="carrito" id="carrito">
            <div class="header-carrito">
                <h2>Tu Carrito</h2>
            </div>

            <div class="carrito-items">
                <!-- Los items del carrito se agregarán dinámicamente aquí -->
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrito-precio-total">
                        $0
                    </span>
                </div>
                <button class="btn-pagar" id="btn-pay" onclick="pagarClicked()">
                    Pagar <i class="fa-solid fa-bag-shopping"></i>
                </button>
            </div>
        </div>
    </section>
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
            <p><i class="fas fa-map-marker-alt"></i> Dirección: Calle 25 # 10 33 | Chia.</p>
            <p><i class="fas fa-phone"></i> Teléfono: +57 3143390341</p>
            <p><i class="fas fa-envelope"></i> Correo: Maryluzdiazavila@gmail.com</p>
        </div>
    </div>
    <div class="footer-bottom">
        <small>&copy; 2023 <b>Distribuidora a la Bodega</b> - Todos los derechos reservados</small>
    </div>
</footer>

<script>
    var carritoVisible = false;

    if (document.readyState == 'loading') {
        document.addEventListener('DOMContentLoaded', ready);
    } else {
        ready();
    }

    function ready() {
        var botonesAgregarAlCarrito = document.getElementsByClassName('boton-item');
        for (var i = 0; i < botonesAgregarAlCarrito.length; i++) {
            var button = botonesAgregarAlCarrito[i];
            button.addEventListener('click', agregarAlCarritoClicked);
        }

        document.getElementsByClassName('btn-pagar')[0].addEventListener('click', pagarClicked);
    }

    function agregarAlCarritoClicked(event) {
        var button = event.target;
        var item = button.parentElement;
        var id = item.dataset.id;
        var titulo = item.getElementsByClassName('titulo-item')[0].innerText;
        var precio = item.getElementsByClassName('precio-item')[0].innerText;
        var imagenSrc = item.getElementsByClassName('img-item')[0].src;

        agregarItemAlCarrito(id, titulo, precio, imagenSrc);
        hacerVisibleCarrito();
    }

    function agregarItemAlCarrito(id, titulo, precio, imagenSrc) {
        var item = document.createElement('div');
        item.classList.add('item');
        var itemsCarrito = document.getElementsByClassName('carrito-items')[0];

        // Comprobar si el producto ya está en el carrito
        var nombresItemsCarrito = itemsCarrito.getElementsByClassName('carrito-item-titulo');
        for (var i = 0; i < nombresItemsCarrito.length; i++) {
            if (nombresItemsCarrito[i].innerText == titulo) {
                Swal.fire({
                    title: "Este item ya se encuentra en el carrito de compras",
                    icon: 'warning',
                    confirmButtonText: 'Entendido'
                });
                return;
            }
        }

        var itemCarritoContenido = `
            <div class="carrito-item">
                <img src="${imagenSrc}" width="80px" alt="">
                <div class="carrito-item-detalles">
                    <span class="carrito-item-titulo">${titulo}</span>
                    <div class="selector-cantidad">
                        <i class="fa-solid fa-minus restar-cantidad"></i>
                        <input type="text" value="1" class="carrito-item-cantidad" disabled>
                        <i class="fa-solid fa-plus sumar-cantidad"></i>
                    </div>
                    <span class="carrito-item-precio">${precio}</span>
                </div>
                <button class="btn-eliminar">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        `;
        item.innerHTML = itemCarritoContenido;
        itemsCarrito.append(item);

        item.getElementsByClassName('restar-cantidad')[0].addEventListener('click', restarCantidad);
        item.getElementsByClassName('sumar-cantidad')[0].addEventListener('click', sumarCantidad);
        item.getElementsByClassName('btn-eliminar')[0].addEventListener('click', eliminarItemCarrito);

        actualizarTotalCarrito();
    }

    function hacerVisibleCarrito() {
        carritoVisible = true;
        var carrito = document.getElementsByClassName('carrito')[0];
        carrito.style.marginRight = '0';
        carrito.style.opacity = '1';

        var items = document.getElementsByClassName('contenedor-items')[0];
        items.style.width = '60%';
    }

    function actualizarTotalCarrito() {
        var carritoItems = document.getElementsByClassName('carrito-item');
        var total = 0;
        for (var i = 0; i < carritoItems.length; i++) {
            var item = carritoItems[i];
            var precioElemento = item.getElementsByClassName('carrito-item-precio')[0];
            var precio = parseFloat(precioElemento.innerText.replace('$', '').replace('.', ''));
            var cantidadItem = item.getElementsByClassName('carrito-item-cantidad')[0];
            var cantidad = cantidadItem.value;
            total = total + (precio * cantidad);
        }
        total = Math.round(total * 100) / 100;
        document.getElementsByClassName('carrito-precio-total')[0].innerText = '$' + total.toLocaleString("es-CO");
    }

    function restarCantidad(event) {
        var buttonClicked = event.target;
        var selector = buttonClicked.parentElement;
        var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0];
        var cantidad = cantidadActual.value;
        cantidad--;
        if (cantidad >= 1) {
            cantidadActual.value = cantidad;
            actualizarTotalCarrito();
        }
    }

    function sumarCantidad(event) {
        var buttonClicked = event.target;
        var selector = buttonClicked.parentElement;
        var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0];
        var cantidad = cantidadActual.value;
        cantidad++;
        cantidadActual.value = cantidad;
        actualizarTotalCarrito();
    }

    function eliminarItemCarrito(event) {
        var buttonClicked = event.target;
        buttonClicked.parentElement.parentElement.remove();
        actualizarTotalCarrito();
        ocultarCarrito();
    }
    

    function ocultarCarrito() {
        var carritoItems = document.getElementsByClassName('carrito-items')[0];
        if (carritoItems.childElementCount == 0) {
            var carrito = document.getElementsByClassName('carrito')[0];
            carrito.style.marginRight = '-100%';
            carrito.style.opacity = '0';
            carritoVisible = false;

            var items = document.getElementsByClassName('contenedor-items')[0];
            items.style.width = '100%';
        }
    }

    function pagarClicked() {
        Swal.fire({
            title: 'Gracias por tu compra!',
            text: 'Tu pedido ha sido procesado.',
            icon: 'success',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.isConfirmed) {
                var carritoItems = document.getElementsByClassName('carrito-items')[0];
                while (carritoItems.hasChildNodes()) {
                    carritoItems.removeChild(carritoItems.firstChild);
                }
                actualizarTotalCarrito();
                ocultarCarrito();
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
</script>
</body>
</html>