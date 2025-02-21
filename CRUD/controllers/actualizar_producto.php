<?php
        if (!empty($_POST["actualizar"])) {
            if (!empty($_POST["descrip_Producto"]) and !empty($_POST["precio_Producto"]) and !empty($_POST["categoria_Producto"]) and !empty($_POST["cantidad_Prod"])) {
               
                $id = $_POST["id"];
                $descrip_Producto = $_POST["descrip_Producto"];
                $precio_Producto = $_POST["precio_Producto"];
                $categoria_Producto = $_POST["categoria_Producto"];
                $cantidad_Prod = $_POST["cantidad_Prod"];
    
                $sql = $conexion->query("UPDATE producto set descrip_Producto='$descrip_Producto', precio_Producto='$precio_Producto', categoria_Producto='$categoria_Producto', cantidad_Prod='$cantidad_Prod' WHERE id_Producto ='$id'");

                if ($sql == 1) {
                    header("location:lista_productos.php");
                } else {
                    echo "Verifica tu solicitud, parece que hay un error";
                }
                
                if (!$sql == 1) {
                    echo 'No se ha registrado la persona';
                } else {
                    echo 'Se ha registrado la persona';
                }
            
            } else {
                echo "Necesitas llenar todos los datos para poder registrar este producto";
            }
        }
?>