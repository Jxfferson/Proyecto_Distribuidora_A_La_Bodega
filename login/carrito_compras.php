<?php
session_start();
include 'PHP/conexion_be.php';

// Función para agregar un producto al carrito
function agregarAlCarrito($idProducto, $cantidad) {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }
    
    if (isset($_SESSION['carrito'][$idProducto])) {
        $_SESSION['carrito'][$idProducto] += $cantidad;
    } else {
        $_SESSION['carrito'][$idProducto] = $cantidad;
    }
}

// Función para obtener el carrito actual
function obtenerCarrito() {
    global $conexion;
    $carrito = array();
    
    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $idProducto => $cantidad) {
            $sql = "SELECT * FROM producto WHERE id_Producto = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("i", $idProducto);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $producto = $resultado->fetch_assoc();
            
            if ($producto) {
                $carrito[] = array(
                    'id' => $producto['id_Producto'],
                    'nombre' => $producto['descrip_Producto'],
                    'precio' => $producto['precio_Producto'],
                    'cantidad' => $cantidad
                );
            }
        }
    }
    
    return $carrito;
}

// Función para procesar el pedido
function procesarPedido($idUsuario) {
    global $conexion;
    
    $carrito = obtenerCarrito();
    $totalPedido = 0;
    foreach ($carrito as $item) {
        $totalPedido += $item['precio'] * $item['cantidad'];
    }
    
    // Insertar el pedido
    $fechaHora = date('Y-m-d H:i:s');
    $estadoPedido = 'Pendiente';
    $pedidoDomicilio = 'No'; // Puedes cambiar esto según tus necesidades
    
    $sql = "INSERT INTO Pedido (fecha_Pedido, hora_Pedido, total_Pedido, estado_Pedido, pedido_Domicilio, id_UsuarioFK) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssdssi", $fechaHora, $fechaHora, $totalPedido, $estadoPedido, $pedidoDomicilio, $idUsuario);
    $stmt->execute();
    $idPedido = $stmt->insert_id;
    
    // Insertar los detalles del pedido (necesitarías crear una tabla para esto)
    foreach ($carrito as $item) {
        $sql = "INSERT INTO DetallePedido (id_Pedido, id_Producto, cantidad, precio_unitario) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("iiid", $idPedido, $item['id'], $item['cantidad'], $item['precio']);
        $stmt->execute();
    }
    
    // Limpiar el carrito
    unset($_SESSION['carrito']);
    
    return $idPedido;
}

// Manejo de acciones AJAX
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'agregar':
            if (isset($_POST['id']) && isset($_POST['cantidad'])) {
                agregarAlCarrito($_POST['id'], $_POST['cantidad']);
                echo json_encode(['success' => true]);
            }
            break;
        case 'obtener':
            echo json_encode(obtenerCarrito());
            break;
        case 'procesar':
            if (isset($_SESSION['id_usuario'])) {
                $idPedido = procesarPedido($_SESSION['id_usuario']);
                echo json_encode(['success' => true, 'id_pedido' => $idPedido]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
            }
            break;
    }
    exit;
}
?>