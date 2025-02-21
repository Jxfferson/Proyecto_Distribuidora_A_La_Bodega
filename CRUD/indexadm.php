<?php
include("conection.php");
$con = conectarDB();

if (!$con) {
    echo "Error: No se pudo conectar a la base de datos";
    exit;
}

$sql = "SELECT * FROM usuario";
$query = mysqli_query($con, $sql);

if (!$query) {
    echo "Error: " . mysqli_error($con);
    exit;
}

if ($query) {
    // Usuario agregado con éxito
    ?>
    <script>
        swal("¡Éxito!", "El usuario ha sido agregado correctamente", "success");
    </script>
    <?php
} else {
    // Error al agregar usuario
    ?>
    <script>
        swal("Error", "No se pudo agregar el usuario", "error");
    </script>
    <?php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="estilos/productos.css">
    <link rel="stylesheet" href="estilos/carro.css">
    <link rel="stylesheet" href="estilos/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>CRUD</title>
</head>

<body>
    <div class="users-form">
        <h1>Crear usuario</h1>
        <form action="insert_user.php" method="POST">
        <input type="text" placeholder="Tipo Documento" required name="tipo_Documento">
        <input type="text" placeholder="Documento"  required name="noDoc_Usuario">
        <input type="text" placeholder="Nombre"  required name="nombre_Usuario">
        <input type="text" placeholder="Apellido"  required name="apellido_Usuario">
        <input type="text" placeholder="Direccion" required name="direccion_Usuario">
        <input type="text" placeholder="Telefono" required name="telefono_Usuario">
        <input type="email" placeholder="Correo Electronico" required name="correo_Usuario">
        <input type="password" placeholder="Contraseña" required name="password_Usuario">

        <input type="submit" value="Agregar Usuario" onclick="agregar()";>

            <div class="text-right">
            <a href="fpdf/reportes.php" target="_blank" class="btn btn-success"><i class="fas fa-file-pdf"></i> Generar Reporte PDF</a>
            </div>
        </form>
    </div>


    <div class="users-table">
        <h2>Usuarios registrados</h2>
        <br>
        <table>
            <thead>
                <tr>
                    <th>ID Usuario</th>
                    <th>Tipo Documento</th>
                    <th>Numero de Documento</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th class="hola">Correo Electronico</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                    <th><?= $row['Id_Usuario']?></th>
                        <th><?= $row['tipo_Documento']?></th>
                        <th><?= $row['noDoc_Usuario']?></th>
                        <th><?= $row['nombre_Usuario']?></th>
                        <th><?= $row['apellido_Usuario']?></th>
                        <th><?= $row['direccion_Usuario']?></th>
                        <th><?= $row['telefono_Usuario']?></th>
                        <th><?= $row['correo_Usuario']?></th>
                        <th><?= $row['password_Usuario']?></th>

                        <th style="display:flex; padding-left:5px;"><a href="delete_user.php?id=<?= $row['Id_Usuario'] ?>" class="users-table--edit" onclick="eliminar()">Eliminar</a>
                        <br>
                         <a href="update.php?noDoc_Usuario=<?php echo $row['noDoc_Usuario']; ?>" class="users-table--edit">Editar</a> </th>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
<script src="sweetalert/alerts.js"></script>
<script src="../login/alerts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>