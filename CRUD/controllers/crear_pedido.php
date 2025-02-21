<?php
include '../../PHP/conexion_be.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productos = $_POST['productos'];

    foreach ($productos as $producto) {
        $producto_id = $producto['id'];
        $cantidad = $producto['cantidad'];
        $precio_total = $producto['precio_total'];

        $sql = $conexion->prepare("INSERT INTO pedido (producto_id, cantidad, precio_total, estado_producto) VALUES (?, ?, ?, ?)");
        $estado_producto = 1;
        $sql->bind_param("iids", $producto_id, $cantidad, $precio_total, $estado_producto);
        $sql->execute();
    }

    echo "Pedido realizado con éxito";
}
?>
