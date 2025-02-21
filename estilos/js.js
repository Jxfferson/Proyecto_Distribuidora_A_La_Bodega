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
    var id = item.dataset.id; // Asegúrate de agregar un atributo data-id a tus elementos HTML
    var titulo = item.getElementsByClassName('titulo-item')[0].innerText;
    var precio = item.getElementsByClassName('precio-item')[0].innerText;
    var imagenSrc = item.getElementsByClassName('img-item')[0].src;

    fetch('tu_archivo_php.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=agregar&id=' + id + '&cantidad=1'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            agregarItemAlCarrito(titulo, precio, imagenSrc);
            hacerVisibleCarrito();
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: "Error",
            text: "No se pudo agregar el producto al carrito.",
            icon: 'error',
            confirmButtonText: 'Entendido'
        });
    });
}

function hacerVisibleCarrito() {
    carritoVisible = true;
    var carrito = document.getElementsByClassName('carrito')[0];
    carrito.style.marginRight = '0';
    carrito.style.opacity = '1';

    var items = document.getElementsByClassName('contenedor-items')[0];
    items.style.width = '60%';
}

function agregarItemAlCarrito(titulo, precio, imagenSrc) {
    var item = document.createElement('div');
    item.classList.add('item');
    var itemsCarrito = document.getElementsByClassName('carrito-items')[0];

    // Controlamos que el item que intenta ingresar no se encuentre en el carrito
    var nombresItemsCarrito = itemsCarrito.getElementsByClassName('carrito-item-titulo');
    for (var i = 0; i < nombresItemsCarrito.length; i++) {
        if (nombresItemsCarrito[i].innerText == titulo) {
            Swal.fire({
                title: "Este producto ya ha sido seleccionado.",
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

function actualizarTotalCarrito() {
    fetch('tu_archivo_php.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=obtener'
    })
    .then(response => response.json())
    .then(carrito => {
        var total = 0;
        var itemsCarrito = document.getElementsByClassName('carrito-items')[0];
        itemsCarrito.innerHTML = ''; // Limpiar el carrito actual

        carrito.forEach(item => {
            var itemHTML = `
                <div class="carrito-item">
                    <img src="${item.imagen}" width="80px" alt="">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">${item.nombre}</span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="${item.cantidad}" class="carrito-item-cantidad" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$${item.precio}</span>
                    </div>
                    <button class="btn-eliminar">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            `;
            itemsCarrito.innerHTML += itemHTML;
            total += item.precio * item.cantidad;
        });

        // Agregar event listeners a los nuevos elementos
        var botonesRestar = itemsCarrito.getElementsByClassName('restar-cantidad');
        var botonesSumar = itemsCarrito.getElementsByClassName('sumar-cantidad');
        var botonesEliminar = itemsCarrito.getElementsByClassName('btn-eliminar');

        for (var i = 0; i < botonesRestar.length; i++) {
            botonesRestar[i].addEventListener('click', restarCantidad);
            botonesSumar[i].addEventListener('click', sumarCantidad);
            botonesEliminar[i].addEventListener('click', eliminarItemCarrito);
        }

        total = Math.round(total);
        document.getElementsByClassName('carrito-precio-total')[0].innerText = '$' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: "Error",
            text: "No se pudo actualizar el carrito.",
            icon: 'error',
            confirmButtonText: 'Entendido'
        });
    });
}

function restarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0];
    var cantidad = parseInt(cantidadActual.value);
    if (cantidad > 1) {
        cantidad--;
        cantidadActual.value = cantidad;
        actualizarTotalCarrito();
    }
}

function sumarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0];
    var cantidad = parseInt(cantidadActual.value);
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
    fetch('tu_archivo_php.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'action=procesar'
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                title: 'Gracias por tu compra!',
                text: 'Tu pedido ha sido procesado. Número de pedido: ' + data.id_pedido,
                icon: 'success',
                confirmButtonText: 'Continuar'
            }).then((result) => {
                if (result.isConfirmed) {
                    limpiarCarrito();
                }
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: data.message || 'Hubo un problema al procesar tu pedido.',
                icon: 'error',
                confirmButtonText: 'Entendido'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire({
            title: "Error",
            text: "No se pudo procesar el pedido.",
            icon: 'error',
            confirmButtonText: 'Entendido'
        });
    });
}

function limpiarCarrito() {
    var carritoItems = document.getElementsByClassName('carrito-items')[0];
    while (carritoItems.hasChildNodes()) {
        carritoItems.removeChild(carritoItems.firstChild);
    }
    actualizarTotalCarrito();
    ocultarCarrito();
}

// Función para mostrar alerta de pago (esto es opcional y solo si lo deseas)
function ThanksPay() {
    var total = document.getElementsByClassName('carrito-precio-total')[0].innerText;
    Swal.fire({
        title: 'Gracias por tu compra!',
        text: 'El total de tu compra es: ' + total,
        icon: 'success',
        confirmButtonText: 'Continuar'
    });
}