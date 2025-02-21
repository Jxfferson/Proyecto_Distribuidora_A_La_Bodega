<?php

    if (!empty($_POST["guardar"])) {
        if (!empty($_POST["descrip_Producto"]) and !empty($_POST["precio_Producto"]) and !empty($_POST["categoria_Producto"]) and !empty($_POST["cantidad_Prod"])) {
           
            $descrip_Producto = $_POST["descrip_Producto"];
            $precio_Producto = $_POST["precio_Producto"];
            $categoria_Producto = $_POST["categoria_Producto"];
            $cantidad_Prod = $_POST["cantidad_Prod"];

            $sql = $conexion->query("INSERT INTO producto(descrip_Producto,precio_Producto,categoria_Producto,cantidad_Prod) VALUES ('$descrip_Producto', '$precio_Producto', '$categoria_Producto', '$cantidad_Prod')");
            
            if (!$sql == 1) {
                echo 'No se ha registrado la persona';
            } else {
                echo 'Se ha registrado el producto';
            }
        
        } else {
            echo "Necesitas llenar todos los datos para poder registrar este producto";
        }
    }

?>