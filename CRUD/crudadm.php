<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Distribuidora a la Bodega</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --background-color: #ecf0f1;
            --text-color: #333;
            --card-bg: #fff;
        }

        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--background-color);
            color: var(--text-color);
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: var(--secondary-color);
            color: #fff;
            padding: 20px;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 120px;
            border-radius: 50%;
        }

        .nav-links {
            list-style: none;
            padding: 0;
        }

        .nav-links li {
            margin-bottom: 15px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .nav-links i {
            margin-right: 10px;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: var(--card-bg);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            margin-top: 0;
            color: var(--primary-color);
        }

        .info-section {
            background-color: var(--card-bg);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .btn {
            background-color: var(--primary-color);
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .dashboard {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                margin-bottom: 20px;
            }
        }

        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 15px;
            background: var(--secondary-color);
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn {
            color: #566787;
            float: right;
            font-size: 13px;
            background: #fff;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn:hover, .table-title .btn:focus {
            color: #566787;
            background: #f2f2f2;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }	
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.settings {
            color: #2196F3;
        }
        table.table td a.delete {
            color: #F44336;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }
        .text-success {
            color: #10c469;
        }
        .text-info {
            color: #62c9e8;
        }
        .text-warning {
            color: #FFC107;
        }
        .text-danger {
            color: #ff5b5b;
        }
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }	
        .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }
        .pagination li.active a:hover {        
            background: #0397d6;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <img src="/placeholder.svg?height=120&width=120" alt="Logo Distribuidora a la Bodega">
            </div>
            <ul class="nav-links">
                <li><a href="../admnpag/index_admin.php"><i class="fas fa-home"></i> Inicio</a></li>
                <li><a href="../CRUD/crudadm.php"><i class="fas fa-users"></i> Usuarios</a></li>
                <li><a href="../CRUD/productosadm/lista_productos.php"><i class="fas fa-box"></i> Productos</a></li>
                <li><a href="../CRUD/pedido/listar_pedidos.php"><i class="fas fa-truck"></i> Pedidos</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <header class="header">
                <h1>Dashboard Admin</h1>
                <div class="user-info">
                    <img src="/placeholder.svg?height=40&width=40" alt="Admin Avatar">
                    <span>Admin User</span>
                </div>
            </header>
            <section class="cards">
                <div class="card">
                    <h3>Total Usuarios</h3>
                    <p>1,234</p>
                </div>
                <div class="card">
                    <h3>Productos Activos</h3>
                    <p>567</p>
                </div>
                <div class="card">
                    <h3>Pedidos Pendientes</h3>
                    <p>89</p>
                </div>
                <div class="card">
                    <h3>Ingresos Mensuales</h3>
                    <p>$12,345</p>
                </div>
            </section>
            <section class="info-section">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h2>Lista de <b>Usuarios</b></h2>
                                </div>
                                <div class="col-sm-7">
                                    <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Añadir Usuario</span></a>
                                    <a href="fpdf/PruebaH.php" target="_blank" class="btn btn-primary"><i class="material-icons">&#xE24D;</i> <span>Generar Reporte</span></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover" id="datatable">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="selectAll">
                                            <label for="selectAll"></label>
                                        </span>
                                    </th>
                                    <th>ID</th>
                                    <th>Tipo Doc</th>
                                    <th>Num Doc</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>Correo Electrónico</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                
                                while ($row = mysqli_fetch_array($query)):
                                ?>
                                <tr>
                                    <td>
                                        <span class="custom-checkbox">
                                            <input type="checkbox" id="checkbox<?= $row['Id_Usuario'] ?>" name="options[]" value="<?= $row['Id_Usuario'] ?>">
                                            <label for="checkbox<?= $row['Id_Usuario'] ?>"></label>
                                        </span>
                                    </td>
                                    <td><?= $row['Id_Usuario'] ?></td>
                                    <td><?= $row['tipo_Documento'] ?></td>
                                    <td><?= $row['noDoc_Usuario'] ?></td>
                                    <td><?= $row['nombre_Usuario'] ?></td>
                                    <td><?= $row['apellido_Usuario'] ?></td>
                                    <td><?= $row['direccion_Usuario'] ?></td>
                                    <td><?= $row['telefono_Usuario'] ?></td>
                                    <td><?= $row['correo_Usuario'] ?></td>
                                    <td>
                                        <a href="update.php?noDoc_Usuario=<?= $row['noDoc_Usuario'] ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                        <a href="delete_user.php?id=<?= $row['Id_Usuario'] ?>" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <a class="button" id="btn-logout" onclick="logoutAdmin()"><button class="btn">Salir</button></a> 
        </main>
    </div>

    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="insert_user.php" method="POST">
                    <div class="modal-header">						
                        <h4 class="modal-title">Añadir Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">					
                        <div class="form-group">
                            <label>Tipo Doc</label>
                            <select name="tipo_Documento" class="form-control">
                                <option>Eligue una opción</option>
                                <option value="CC">Cédula de Ciudadanía (CC)</option>
                                <option value="TI">Tarjeta de Identidad (T.I.)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Num Doc</label>
                            <input type="text" class="form-control" placeholder="Documento" name="noDoc_Usuario" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre_Usuario" required>
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" class="form-control" placeholder="Apellido" name="apellido_Usuario" required>
                        </div>
                        <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" class="form-control" placeholder="Direccion" name="direccion_Usuario" required>
                        </div>
                        <div class="form-group">
                            <label>Celular</label>
                            <input type="text" class="form-control" placeholder="Telefono" name="telefono_Usuario" required>
                        </div>	
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="email" class="form-control" placeholder="Correo Electronico" name="correo_Usuario" required>
                        </div>	
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="Contraseña" name="password_Usuario" required>
                        </div>		
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                        <input type="hidden" name="agregar" value="1">
                        <input type="submit" class="btn btn-success" value="Agregar">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script src="../login/alerts.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
                }
            });
        });
        
        document.getElementById('selectAll').onclick = function() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        };
    </script>
</body>
</html>