<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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
            background-color: #28a745;
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
            background-color: #28a745;
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 20px;
        }
        .btn-warning, .btn-primary, .btn-danger {
            border-radius: 20px;
            padding: 8px 20px;
        }
        .form-control {
            border-radius: 10px;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
            border-color: #28a745;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            font-weight: bold;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
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
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Crear Producto</h2>
                                </div>
                                <div class="card-body">
                                    <a href="lista_productos.php" class="btn btn-warning mb-4">
                                        <i class="fas fa-arrow-left me-2"></i>Volver
                                    </a>
                                    <form method="POST">
                                        <?php
                                        include "../../PHP/conexion_be.php";
                                        include "../controllers/registrar_producto.php";
                                        ?>
                                        <div class="mb-3">
                                            <label for="descrip_Producto" class="form-label">Nombre del producto</label>
                                            <input type="text" class="form-control" id="descrip_Producto" name="descrip_Producto" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="precio_Producto" class="form-label">Precio del producto</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" step="0.01" class="form-control" id="precio_Producto" name="precio_Producto" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="categoria_Producto" class="form-label">Categoría del producto</label>
                                            <select class="form-select" id="categoria_Producto" name="categoria_Producto" required>
                                                <option value="" selected disabled>Seleccione una categoría</option>
                                                <option value="Electrónica">Electrónica</option>
                                                <option value="Ropa">Ropa</option>
                                                <option value="Hogar">Hogar</option>
                                                <option value="Alimentos">Alimentos</option>
                                                <option value="Otros">Otros</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cantidad_Prod" class="form-label">Cantidad del producto</label>
                                            <input type="number" class="form-control" id="cantidad_Prod" name="cantidad_Prod" min="0" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" name="guardar" value="val-guardar">
                                                <i class="fas fa-save me-2"></i>Guardar Producto
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                var isValid = true;
                $('input[required], select[required]').each(function() {
                    if ($(this).val() === '') {
                        isValid = false;
                        $(this).addClass('is-invalid');
                    } else {
                        $(this).removeClass('is-invalid');
                    }
                });
                if (!isValid) {
                    e.preventDefault();
                    alert('Por favor, complete todos los campos requeridos.');
                }
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