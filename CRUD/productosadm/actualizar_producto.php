<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }
        .dashboard {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding-top: 20px;
        }
        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar .logo img {
            width: 120px;
            border-radius: 50%;
        }
        .sidebar .nav-link {
            color: white;
            padding: 10px 20px;
            margin-bottom: 5px;
        }
        .sidebar .nav-link:hover {
            background-color: #34495e;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
            flex-grow: 1;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 15px;
        }
        .btn-success, .btn-warning, .btn-danger, .btn-primary {
            border-radius: 20px;
            padding: 8px 20px;
        }
        .form-control {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <img src="/placeholder.svg?height=120&width=120" alt="Logo Distribuidora a la Bodega">
            </div>
            <nav class="nav flex-column">
                <a class="nav-link" href="../../admnpag/index_admin.php"><i class="fas fa-home"></i> Inicio</a>
                <a class="nav-link" href="../crudadm.php"><i class="fas fa-users"></i> Usuarios</a>
                <a class="nav-link active" href="lista_productos.php"><i class="fas fa-box"></i> Productos</a>
                <a class="nav-link" href="../pedido/listar_pedidos.php"><i class="fas fa-truck"></i> Pedidos</a>
            </nav>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>Dashboard Administrador</h1>
                <button class="btn btn-danger" onclick="cerrarSesion()">Cerrar Sesión</button>
            </header>
            <div class="content">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-0">Actualizar Producto</h2>
                        </div>
                        <div class="card-body">
                            <a href="lista_productos.php" class="btn btn-warning mb-3">Volver</a>
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $_GET["id"]?>">
                                <?php
                                include "../../PHP/conexion_be.php";
                                include "../controllers/actualizar_producto.php";

                                $id = $_GET["id"];
                                $sql = $conexion->query("SELECT * FROM producto WHERE id_Producto = $id");
                                while($data = $sql->fetch_object()) { ?>
                                    <div class="mb-3">
                                        <label class="form-label">Nombre del producto</label>
                                        <input type="text" class="form-control" name="descrip_Producto" value="<?= $data->descrip_Producto ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Precio del producto</label>
                                        <input type="text" class="form-control" name="precio_Producto" value="<?= $data->precio_Producto ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Categoria del producto</label>
                                        <input type="text" class="form-control" name="categoria_Producto" value="<?= $data->categoria_Producto ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Cantidad del producto</label>
                                        <input type="text" class="form-control" name="cantidad_Prod" value="<?= $data->cantidad_Prod ?>">
                                    </div>
                                <?php
                                } 
                                ?>
                                <button type="submit" class="btn btn-primary" name="actualizar" value="val-actualizar">Actualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function cerrarSesion() {
            // Aquí puedes agregar la lógica para cerrar sesión
            // Por ejemplo, redirigir a la página de logout
            window.location.href = '../../logout.php';
        }
    </script>
</body>
</html>