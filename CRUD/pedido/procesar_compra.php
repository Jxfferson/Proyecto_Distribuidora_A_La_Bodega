// En proceso de creaciòn la funcionalidad de esta categoria
<?php
// Incluir la conexión a la base de datos
include 'conexion_be.php';

// Obtener los datos enviados por POST 
$inputData = file_get_contents('php://input');
$pedido = json_decode($inputData, true);

// Verificar si se recibieron los datos correctamente
if (!empty($pedido)) {
    // Datos de ejemplo que puedes reemplazar con los valores reales ya sea de tu proyecto u otra cosa quy quieras agregar
    $fecha_pedido = date('Y-m-d');
    $hora_pedido = date('H:i:s');
    $estado_pedido = 'Pendiente'; // Asigna el estado inicial, en este caso pendiente
    $pedido_domicilio = 1; // O el valor que manejes 
    $id_usuario = 1; // Reemplazamos esto con el ID del usuario real, quizás por sesión, puede ser trayendo las ID de la BD, asi puedes hacer tomando el correo y de ahi la ID del usuario que realizo el pedido

    // Variable para verificar si la inserción fue exitosa
    $success = true;

    // Iniciamos la transacción
    $conexion->begin_transaction();

    try {
        // Calcular el total del pedido sumando los precios de todos los productos
        $total_pedido = 0;
        foreach ($pedido as $item) {
            $total_pedido += $item['precio'] * $item['cantidad'];
        }

        // Insertar el pedido en la tabla `pedido`
        $query = "INSERT INTO pedido (fecha_Pedido, hora_Pedido, total_Pedido, estado_Pedido, pedido_Domicilio, id_UsuarioFK) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("ssdssi", $fecha_pedido, $hora_pedido, $total_pedido, $estado_pedido, $pedido_domicilio, $id_usuario);
        
        if ($stmt->execute()) {
            // Obtenemos el ID del pedido recién insertado
            $id_pedido = $conexion->insert_id;

            // Insertar los detalles de los productos en la tabla (si es que tienes una tabla relacionada para detalles de productos)
            foreach ($pedido as $item) {
                $nombre_producto = $item['producto'];
                $cantidad = $item['cantidad'];
                
                // Crear la consulta para insertar los detalles del producto
                $query_detalle = "INSERT INTO detalles_pedido (id_PedidoFK, nombre_Producto, cantidad) 
                                  VALUES (?, ?, ?)";
                $stmt_detalle = $conexion->prepare($query_detalle);
                $stmt_detalle->bind_param("isi", $id_pedido, $nombre_producto, $cantidad);
                
                if (!$stmt_detalle->execute()) {
                    $success = false;
                    break; // Si hay error, le pedimos que salgha del bucle
                }
            }

            if ($success) {
                // Confirmar la transacción si todo salió bien
                $conexion->commit();
                echo json_encode([
                    'success' => true, 
                    'id_pedido' => $id_pedido,
                    'total_pedido' => $total_pedido,
                    'estado_pedido' => $estado_pedido,
                    'id_usuario' => $id_usuario
                ]);
            } else {
                // Revertir la transacción si hubo error en los detalles, asi podemos ser màs claros 
                $conexion->rollback();
                echo json_encode(['success' => false, 'message' => 'Error al insertar los detalles del pedido.']);
            }
        } else {
            // Revertir la transacción en caso de error al insertar el pedido
            $conexion->rollback();
            echo json_encode(['success' => false, 'message' => 'Error al insertar el pedido.']);
        }
    } catch (Exception $e) {
        // Revertir la transacción en caso de excepción, aca iria otro mensaje que sea especifico en el error que se haya realizado
        $conexion->rollback();
        echo json_encode(['success' => false, 'message' => 'Excepción: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No se recibieron datos del pedido.']);
}

// Cerrar la conexión
$conexion->close();
?>