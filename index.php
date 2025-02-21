<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribuidora a la Bodega</title>
    <link rel="icon" href="empresa/EMPRESA.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #ecf0f1;
            --accent-color: #e74c3c;
            --text-color: #34495e;
            --background-color: #f5f5f5;
        }

        .dark-mode {
            --primary-color: #1a1a1a;
            --secondary-color: #2c2c2c;
            --accent-color: #e74c3c;
            --text-color: #f5f5f5;
            --background-color: #121212;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: background-color 0.3s, color 0.3s;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--background-color);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            height: 50px;
        }

        nav ul {
            display: flex;
            list-style-type: none;
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: var(--accent-color);
        }

        .submenu {
            display: none;
            position: absolute;
            background-color: var(--primary-color);
            min-width: 150px;
        }

        nav ul li:hover .submenu {
            display: block;
        }

        .btn-create-account {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-create-account:hover {
            background-color: #c0392b;
        }

        .hero {
            background-image: url('empresa/imagen1.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 2rem;
            border-radius: 10px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .cta-button {
            display: inline-block;
            background-color: var(--accent-color);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #c0392b;
        }

        .features {
            padding: 4rem 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background-color: var(--secondary-color);
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            margin-bottom: 1rem;
        }

        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .footer-section {
            flex: 1;
            margin-right: 2rem;
            margin-bottom: 1rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
        }

        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin-right: 1rem;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: var(--accent-color);
        }

        .footer-bottom {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .theme-toggle {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            margin-left: 1rem;
        }

        .product-showcase {
            padding: 4rem 0;
            background-color: var(--secondary-color);
        }

        .product-slider {
            display: flex;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .product-slider::-webkit-scrollbar {
            display: none;
        }

        .product-card {
            flex: 0 0 300px;
            margin-right: 1rem;
            background-color: var(--background-color);
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            scroll-snap-align: start;
            transition: transform 0.3s;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .product-info {
            padding: 1rem;
        }

        .product-info h3 {
            margin-bottom: 0.5rem;
        }

        .product-info p {
            font-size: 0.9rem;
            color: var(--text-color);
        }

        .testimonials {
            padding: 4rem 0;
            background-color: var(--background-color);
        }

        .testimonial-card {
            background-color: var(--secondary-color);
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .testimonial-content {
            font-style: italic;
            margin-bottom: 1rem;
        }

        .testimonial-author {
            font-weight: bold;
        }

        .faq {
            padding: 4rem 0;
            background-color: var(--secondary-color);
        }

        .faq-item {
            margin-bottom: 1rem;
        }

        .faq-question {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem;
            cursor: pointer;
            border-radius: 5px;
        }

        .faq-answer {
            background-color: var(--background-color);
            padding: 1rem;
            display: none;
            border-radius: 0 0 5px 5px;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                align-items: flex-start;
            }

            nav ul {
                flex-direction: column;
                width: 100%;
            }

            nav ul li {
                width: 100%;
            }

            .submenu {
                position: static;
                display: none;
            }

            nav ul li:hover .submenu {
                display: block;
            }

            .btn-create-account {
                margin-top: 1rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .footer-content {
                flex-direction: column;
            }

            .footer-section {
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
<header>
        <div class="container header-content">
            <div class="logo">
                <img src="empresa/EMPRESA.png" alt="Logo Distribuidora a la Bodega">
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li>
                        <a href="#">Productos ▼</a>
                        <ul class="submenu">
                            <li><a href="lacteosquesos.php">Lácteos</a></li>
                            <li><a href="carnes.php">Carnes</a></li>
                            <li><a href="jamones.php">Jamones</a></li>
                            <li><a href="embutidos.php">Embutidos</a></li>
                        </ul>
                    </li>
                    <li><a href="form.php">Contacto</a></li>
                </ul>
            </nav>
            <div class="header-buttons">
                <button class="btn-create-account" onclick="logoutAlert(event)">Cerrar sesión</button>
                <button class="theme-toggle" onclick="toggleTheme()" aria-label="Cambiar tema">
                    <i class="fas fa-moon"></i>
                </button>
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h1>Distribuidora a la Bodega</h1>
                <p>Calidad y frescura en cada producto</p>
                <a href="#" class="cta-button">Descubre nuestros productos</a>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <div class="features-grid">
                    <div class="feature-card">
                        <img src="empresa/imagen1.jpg" alt="¿Quienes Somos?">
                        <h3>¿Quienes Somos?</h3>
                        <p>Somos una empresa dedicada al envío de Salsamentarías a toda Bogotá. ¡Nuestros productos son de buena calidad y te gustarán mucho!</p>
                    </div>
                    <div class="feature-card">
                        <img src="empresa/imagen2.jpg" alt="Nuestros productos">
                        <h3>Nuestros productos</h3>
                        <p>La calidad de nuestros productos es una de las mejores, puedes contar con la seguridad de comer cosas en buen estado y buenas para tu salud.</p>
                    </div>
                    <div class="feature-card">
                        <img src="empresa/maxresdefault.jpg" alt="Dónde nos ubicamos">
                        <h3>Dónde nos ubicamos</h3>
                        <p>Actualmente estamos ubicados en Chía, puedes tener mas información en la parte posterior de nuestra web.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-showcase">
            <div class="container">
                <h2>Nuestros Productos Destacados</h2>
                <div class="product-slider">
                    <div class="product-card">
                        <img src="lacteos/fresco.png" alt="Queso Fresco">
                        <div class="product-info">
                            <h3>Queso Fresco</h3>
                            <p>Delicioso queso fresco, perfecto para acompañar tus comidas.</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="jamones/serrano.png" alt="Jamón Serrano">
                        <div class="product-info">
                            <h3>Jamón Serrano</h3>
                            <p>Jamón serrano de alta calidad, curado a la perfección.</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="embutidos/chorizo.png" alt="Salchichas Alemanas">
                        <div class="product-info">
                            <h3>Chorizos</h3>
                            <p>Auténticas chorizos, ideales para tus parrilladas.</p>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="lacteos/yogur.png" alt="Yogurt Natural">
                        <div class="product-info">
                            <h3>Yogurt Natural</h3>
                            <p>Yogurt natural cremoso, perfecto para un desayuno saludable.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials">
            <div class="container">
                <h2>Lo que dicen nuestros clientes</h2>
                <div class="testimonial-card">
                    <p class="testimonial-content">"Los productos de Distribuidora a la Bodega son increíbles. Siempre frescos y de excelente calidad. ¡No puedo dejar de recomendarlos!"</p>
                    <p class="testimonial-author">- María Rodríguez</p>
                </div>
                <div class="testimonial-card">
                    <p class="testimonial-content">"El servicio de entrega es rápido y eficiente. Los productos llegan en perfectas condiciones. ¡Excelente experiencia de compra!"</p>
                    <p class="testimonial-author">- Juan Pérez</p>
                </div>
            </div>
        </section>

        <section class="faq">
            <div class="container">
                <h2>Preguntas Frecuentes</h2>
                <div class="faq-item">
                    <div class="faq-question">¿Cuál es el tiempo de entrega?</div>
                    <div class="faq-answer">Nuestro tiempo de entrega estándar es de 24 a 48 horas hábiles después de realizado el pedido.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">¿Cuál es el pedido mínimo?</div>
                    <div class="faq-answer">El pedido mínimo es de $50.000 pesos colombianos.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">¿Cómo puedo hacer un pedido?</div>
                    <div class="faq-answer">Puedes hacer tu pedido a través de nuestra página web, por teléfono o por WhatsApp.</div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container footer-content">
            <div class="footer-section">
                <h3>Sobre Nosotros</h3>
                <p>Somos una empresa dedicada al envío de Salsamentarías a todo Bogotá!</p>
            </div>
            <div class="footer-section">
                <h3>Nuestras Redes</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>¿Cómo encontrarnos?</h3>
                <p><i class="fas fa-map-marker-alt"></i> Dirección: Calle 25 # 10 33 | Chia.</p>
                <p><i class="fas fa-phone"></i> Teléfono: +57 3143390341</p>
                <p><i class="fas fa-envelope"></i> Correo: Maryluzdiazavila@gmail.com</p>
            </div>
        </div>
        <div class="footer-bottom">
            <small>&copy; 2023 <b>Distribuidora a la Bodega</b> - Todos los derechos reservados</small>
        </div>
    </footer>

    <script>
        function logoutAlert(event) {
            event.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¿Quieres ir al inicio?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, salir'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';
                }
            });
        }

        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
            const themeIcon = document.querySelector('.theme-toggle i');
            if (document.body.classList.contains('dark-mode')) {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            } else {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const header = document.querySelector('header');
            const headerHeight = header.offsetHeight;

            window.addEventListener('scroll', () => {
                if (window.scrollY > headerHeight) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });

            // Animación de aparición para las tarjetas de características
            const featureCards = document.querySelectorAll('.feature-card');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            featureCards.forEach(card => {
                card.style.opacity = 0;
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'opacity 0.5s, transform 0.5s';
                observer.observe(card);
            });

            // Funcionalidad para las preguntas frecuentes
            const faqQuestions = document.querySelectorAll('.faq-question');
            faqQuestions.forEach(question => {
                question.addEventListener('click', () => {
                    const answer = question.nextElementSibling;
                    answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
                });
            });

            // Animación para el slider de productos
            const productSlider = document.querySelector('.product-slider');
            let isDown = false;
            let startX;
            let scrollLeft;

            productSlider.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - productSlider.offsetLeft;
                scrollLeft = productSlider.scrollLeft;
            });

            productSlider.addEventListener('mouseleave', () => {
                isDown = false;
            });

            productSlider.addEventListener('mouseup', () => {
                isDown = false;
            });

            productSlider.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - productSlider.offsetLeft;
                const walk = (x - startX) * 3;
                productSlider.scrollLeft = scrollLeft - walk;
            });
        });
    </script>
</body>
</html>