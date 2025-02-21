<?php
include '../../PHP/conexion_be.php';

if (isset($_GET['id']) && isset($_GET['estado'])) {
    $idPedido = $_GET['id'];
    $nuevoEstado = $_GET['estado'];
    
    try {
        $stmt = $conexion->prepare("UPDATE Pedido SET estado_Pedido = ? WHERE Id_Pedido = ?");
        $stmt->bind_param("si", $nuevoEstado, $idPedido);
        $stmt->execute();

        if ($nuevoEstado === 'Cancelado') {
            $stmt = $conexion->prepare("INSERT INTO cancelados (producto, usuario, pedido, fecha_cancelacion) 
                                         SELECT pr.descrip_Producto, p.id_UsuarioFK, p.Id_Pedido, NOW() 
                                         FROM Pedido p 
                                         JOIN Producto pr ON p.nombre_Producto = pr.id_Producto 
                                         WHERE p.Id_Pedido = ?");
            $stmt->bind_param("i", $idPedido);
            $stmt->execute();
        } elseif ($nuevoEstado === 'Entregado') {
            $stmt = $conexion->prepare("INSERT INTO entregados (producto, usuario, pedido, fecha_cancelacion) 
                                         SELECT pr.descrip_Producto, p.id_UsuarioFK, p.Id_Pedido, NOW() 
                                         FROM Pedido p 
                                         JOIN Producto pr ON p.nombre_Producto = pr.id_Producto 
                                         WHERE p.Id_Pedido = ?");
            $stmt->bind_param("i", $idPedido);
            $stmt->execute();
        }

        header('Location: ../pedido/listar_pedidos.php');
        exit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Faltan parámetros.";
}
?>
