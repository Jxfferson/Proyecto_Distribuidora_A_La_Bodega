<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
        .btn-success, .btn-warning, .btn-danger {
            border-radius: 20px;
            padding: 8px 20px;
        }
        #datatable {
            border-collapse: separate;
            border-spacing: 0 8px;
        }
        #datatable thead th {
            border-bottom: none;
            background-color: #f1f3f5;
        }
        #datatable tbody tr {
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-radius: 5px;
            transition: transform 0.2s;
        }
        #datatable tbody tr:hover {
            transform: translateY(-3px);
        }
        #datatable tbody td {
            vertical-align: middle;
        }
        .btn-sm {
            border-radius: 15px;
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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2 class="mb-0">Lista de Productos</h2>
                            <a href="crear_producto.php" class="btn btn-success">Crear Producto</a>
                        </div>
                        <div class="card-body">
                            <a href="../../admnpag/index_admin.php" class="btn btn-warning mb-3">Volver</a>
                            <table class="table table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Categoría</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    include '../../PHP/conexion_be.php';

                                    $sql = $conexion->query("SELECT * FROM producto");
                                    while($data = $sql->fetch_object()) { ?>
                                    <tr>
                                        <td><?= $data->id_Producto ?></td>
                                        <td><?= $data->descrip_Producto ?></td>
                                        <td>$<?= number_format($data->precio_Producto, 2) ?></td>
                                        <td><?= $data->categoria_Producto ?></td>
                                        <td><?= $data->cantidad_Prod ?></td>
                                        <td>
                                            <a href="actualizar_producto.php?id=<?= $data->id_Producto ?>" class="btn btn-primary btn-sm">Actualizar</a>
                                            <a href="eliminar_producto.php?id=<?= $data->id_Producto ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</a>

                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>
                                </tbody>
                            </table>  
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
                },
                "pageLength": 10,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                "order": [[0, "desc"]]
            });
        });

        function cerrarSesion() {
            // Aquí puedes agregar la lógica para cerrar sesión
            // Por ejemplo, redirigir a la página de logout
            window.location.href = '../../logout.php';
        }
    </script>
</body>
</html>