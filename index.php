<?php
session_start();
require_once 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a MobileStore - Tu Tienda de Celulares</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; color: #333; min-height: 100vh; display: flex; flex-direction: column; }
        .navbar { background-color: #1a252f; display: flex; justify-content: space-between; align-items: center; padding: 15px 40px; position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 10px rgba(0,0,0,0.15); }
        .navbar .logo { color: #fff; font-size: 24px; font-weight: bold; text-decoration: none; }
        .navbar .logo span { color: #3498db; }
        .nav-links { list-style: none; display: flex; align-items: center; gap: 15px; }
        .nav-links li a { color: #ecf0f1; text-decoration: none; font-size: 15px; font-weight: 600; padding: 8px 12px; border-radius: 4px; transition: background 0.3s, color 0.3s; }
        .nav-links li a:hover, .nav-links li a.active { background-color: #3498db; color: white; }
        .btn-sesion { background-color: #27ae60 !important; }
        .btn-sesion:hover { background-color: #219150 !important; }
        .btn-salir { background-color: #e74c3c !important; }
        .btn-salir:hover { background-color: #c0392b !important; }
        .bienvenida-user { color: #2ecc71; font-weight: bold; font-size: 14px; padding: 0 6px; }
        .hero-presentacion { background: linear-gradient(135deg, #1a252f, #2c3e50); color: white; text-align: center; padding: 100px 20px; flex: 1; display: flex; flex-direction: column; justify-content: center; align-items: center; }
        .hero-presentacion h1 { font-size: 42px; margin-bottom: 15px; }
        .hero-presentacion h1 span { color: #3498db; }
        .hero-presentacion p { font-size: 20px; max-width: 700px; margin: 0 auto 30px auto; opacity: 0.9; line-height: 1.5; }
        .btn-cta { display: inline-block; background-color: #3498db; color: white; padding: 14px 28px; font-size: 18px; font-weight: bold; text-decoration: none; border-radius: 6px; transition: background 0.3s; }
        .btn-cta:hover { background-color: #2980b9; }
        footer { background-color: #1a252f; color: #bdc3c7; text-align: center; padding: 25px; }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.php" class="logo">Mobile<span>Store</span></a>
        <ul class="nav-links">
            <li><a href="index.php" class="active">Inicio</a></li>
            <li><a href="iphone.php">iPhone</a></li>
            <li><a href="samsung.php">Samsung</a></li>
            <li><a href="xiaomi.php">Xiaomi</a></li>
            <li><a href="motorola.php">Motorola</a></li>
            <li><a href="google.php">Google</a></li>
            <li><a href="carrito.php">Carrito (<?php echo isset($_SESSION['carrito']) ? array_sum(array_column($_SESSION['carrito'], 'cantidad')) : 0; ?>)</a></li>
            
            <?php if(isset($_SESSION['nombre'])): ?>
                <li class="bienvenida-user">Sesión iniciada | Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></li>
                <li><a href="logout.php" class="btn-salir">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="login.php" class="btn-sesion">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <header class="hero-presentacion">
        <h1>Bienvenido a <span>MobileStore</span></h1>
        <p>Tu plataforma líder en tecnología móvil. Descubre los dispositivos más innovadores de las mejores marcas del mercado con envíos seguros a todo México.</p>
        <?php if(isset($_SESSION['nombre'])): ?>
            <a href="iphone.php" class="btn-cta">Explorar Catálogo</a>
        <?php else: ?>
            <a href="login.php" class="btn-cta">Ingresar a Comprar</a>
        <?php endif; ?>
    </header>

    <footer>
        <p>Ortega Villanueva César | 5-J | 0879</p>
    </footer>
</body>
</html>