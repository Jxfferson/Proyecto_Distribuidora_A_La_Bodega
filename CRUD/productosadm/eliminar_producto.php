<?php
include '../../PHP/conexion_be.php';

// Verifica si se ha enviado el ID del producto a eliminar
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Elimina el producto de la base de datos
    $sql = $conexion->query("DELETE FROM producto WHERE id_Producto = '$id_producto'");

    if ($sql) {
        // Si la eliminación es exitosa, redirige a la lista de productos
        header("Location: lista_productos.php?mensaje=Producto eliminado correctamente");
    } else {
        // Si ocurre algún error, redirige con un mensaje de error
        header("Location: lista_productos.php?error=No se pudo eliminar el producto");
    }
} else {
    // Si no se envía un ID válido, redirige a la lista de productos
    header("Location: lista_productos.php");
}
?>