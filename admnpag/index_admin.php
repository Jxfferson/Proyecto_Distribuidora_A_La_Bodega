<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Distribuidora a la Bodega</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
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
    </style>
</head>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <div class="logo">
                <img src="/placeholder.svg?height=120&width=120" alt="Logo Distribuidora a la Bodega">
            </div>
            <ul class="nav-links">
                <li><a href="index_admin.php"><i class="fas fa-home"></i> Inicio</a></li>
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
                <h2>Información de la Empresa</h2>
                <p>Distribuidora a la Bodega es una empresa dedicada al envío de Salsamentarías a toda Bogotá. Nuestros productos son de alta calidad y satisfacen las necesidades de nuestros clientes.</p>
            </section>
            <section class="info-section">
                <h2>Ubicación</h2>
                <p><i class="fas fa-map-marker-alt"></i> Calle 25 # 10 33 | Chia, Bogotá</p>
                <p><i class="fas fa-phone"></i> +57 3143390341</p>
                <p><i class="fas fa-envelope"></i> Maryluzdiazavila@gmail.com</p>
            </section>
            <a class="button" id="btn-logout" onclick="logoutAdmin()"><button class="btn">Salir</button></a> 
        </main>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="sweetalert/swal.js"></script>
    <script src="../login/alerts.js"></script>
</body>
</html>