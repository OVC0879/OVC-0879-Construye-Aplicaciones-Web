<?php session_start(); require_once 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Pixel - MobileStore</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; color: #333; }
        .navbar { background-color: #1a252f; display: flex; justify-content: space-between; align-items: center; padding: 15px 40px; position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 10px rgba(0,0,0,0.15); }
        .navbar .logo { color: #fff; font-size: 24px; font-weight: bold; text-decoration: none; }
        .navbar .logo span { color: #3498db; }
        .nav-links { list-style: none; display: flex; align-items: center; gap: 15px; }
        .nav-links li a { color: #ecf0f1; text-decoration: none; font-size: 15px; font-weight: 600; padding: 8px 12px; border-radius: 4px; transition: 0.3s; }
        .nav-links li a:hover, .nav-links li a.active { background-color: #3498db; color: white; }
        .btn-sesion { background-color: #27ae60 !important; }
        .container { max-width: 1200px; margin: 40px auto; padding: 0 20px; }
        .marca-header { border-bottom: 3px solid #3498db; padding-bottom: 10px; margin-bottom: 25px; }
        .grid-productos { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; }
        .card-celular { background: white; border-radius: 8px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.06); text-align: center; transition: 0.2s; }
        .card-celular:hover { transform: translateY(-5px); }
        .img-link { display: block; margin: 10px 0 15px 0; border-radius: 5px; overflow: hidden; }
        .card-celular img { width: 100%; height: 180px; object-fit: contain; transition: 0.3s; }
        .card-celular img:hover { transform: scale(1.08); }
        .card-celular .precio { font-size: 20px; color: #27ae60; font-weight: bold; margin: 10px 0; }
        .card-celular .btn-comprar { display: inline-block; background-color: #1a252f; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; width: 100%; font-weight: bold; }
        .card-celular .btn-comprar:hover { background-color: #3498db; }
        footer { background-color: #1a252f; color: #bdc3c7; text-align: center; padding: 20px; margin-top: 50px; }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.php" class="logo">Mobile<span>Store</span></a>
        <ul class="nav-links">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="iphone.php">iPhone</a></li>
            <li><a href="samsung.php">Samsung</a></li>
            <li><a href="xiaomi.php">Xiaomi</a></li>
            <li><a href="motorola.php">Motorola</a></li>
            <li><a href="google.php" class="active">Google</a></li>
            <li><a href="carrito.php">Carrito (<?php echo isset($_SESSION['carrito']) ? array_sum(array_column($_SESSION['carrito'], 'cantidad')) : 0; ?>)</a></li>
            <<?php if(isset($_SESSION['nombre'])): ?>
                <li style="color: #2ecc71; font-weight: bold; font-size: 14px; padding: 0 6px;">
                    Sesión iniciada | Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?>
                </li>
                <li><a href="logout.php" class="btn-sesion" style="background-color: #e74c3c !important;">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="login.php" class="btn-sesion">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <main class="container">
        <div class="marca-header">
            <h2>Catálogo Google Pixel</h2>
        </div>
        <div class="grid-productos">
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Pixel+Fold&precio=31999" class="img-link"><img src="https://m.media-amazon.com/images/I/71VfMpqMzdL.jpg" alt="Pixel Fold"></a>
                <h3>Pixel Fold</h3>
                <p class="precio">$31,999.00 MXN</p>
                <p><small>Stock disponible: 3</small></p>
                <a href="agregar_carrito.php?nombre=Pixel+Fold&precio=31999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Pixel+8+Pro&precio=21999" class="img-link"><img src="https://cdn.homedepot.com.mx/productos/218413/218413-d.jpg" alt="Pixel 8 Pro"></a>
                <h3>Pixel 8 Pro</h3>
                <p class="precio">$21,999.00 MXN</p>
                <p><small>Stock disponible: 7</small></p>
                <a href="agregar_carrito.php?nombre=Pixel+8+Pro&precio=21999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Pixel+8&precio=15999" class="img-link"><img src="https://m.media-amazon.com/images/I/61vt9Qz+YYL._AC_UF350,350_QL80_.jpg" alt="Pixel 8"></a>
                <h3>Pixel 8</h3>
                <p class="precio">$15,999.00 MXN</p>
                <p><small>Stock disponible: 10</small></p>
                <a href="agregar_carrito.php?nombre=Pixel+8&precio=15999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Pixel+8a&precio=10999" class="img-link"><img src="https://m.media-amazon.com/images/I/61l5ELe+8gL.jpg" alt="Pixel 8a"></a>
                <h3>Pixel 8a</h3>
                <p class="precio">$10,999.00 MXN</p>
                <p><small>Stock disponible: 12</small></p>
                <a href="agregar_carrito.php?nombre=Pixel+8a&precio=10999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Pixel+7+Pro&precio=14499" class="img-link"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTHmDyEPi-6kpLhdLT5Z36n8MP-NHrX7d43llmGZhLr9w&s=10" alt="Pixel 7 Pro"></a>
                <h3>Pixel 7 Pro</h3>
                <p class="precio">$14,499.00 MXN</p>
                <p><small>Stock disponible: 8</small></p>
                <a href="agregar_carrito.php?nombre=Pixel+7+Pro&precio=14499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Pixel+7&precio=10499" class="img-link"><img src="https://m.media-amazon.com/images/I/71loUpMg0pL.jpg" alt="Pixel 7"></a>
                <h3>Pixel 7</h3>
                <p class="precio">$10,499.00 MXN</p>
                <p><small>Stock disponible: 11</small></p>
                <a href="agregar_carrito.php?nombre=Pixel+7&precio=10499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Pixel+7a&precio=8499" class="img-link"><img src="https://http2.mlstatic.com/D_NQ_NP_621011-MLU77450448808_072024-O.webp" alt="Pixel 7a"></a>
                <h3>Pixel 7a</h3>
                <p class="precio">$8,499.00 MXN</p>
                <p><small>Stock disponible: 14</small></p>
                <a href="agregar_carrito.php?nombre=Pixel+7a&precio=8499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Pixel+6+Pro&precio=9999" class="img-link"><img src="https://m.media-amazon.com/images/I/71ee+5V4ZRL._AC_UF1000,1000_QL80_.jpg" alt="Pixel 6 Pro"></a>
                <h3>Pixel 6 Pro</h3>
                <p class="precio">$9,999.00 MXN</p>
                <p><small>Stock disponible: 6</small></p>
                <a href="agregar_carrito.php?nombre=Pixel+6+Pro&precio=9999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Pixel+6&precio=7299" class="img-link"><img src="https://m.media-amazon.com/images/I/61ruKkvVIxL.jpg" alt="Pixel 6"></a>
                <h3>Pixel 6</h3>
                <p class="precio">$7,299.00 MXN</p>
                <p><small>Stock disponible: 15</small></p>
                <a href="agregar_carrito.php?nombre=Pixel+6&precio=7299" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Pixel+6a&precio=5899" class="img-link"><img src="https://m.media-amazon.com/images/I/514pgzf2c2L.jpg" alt="Pixel 6a"></a>
                <h3>Pixel 6a</h3>
                <p class="precio">$5,899.00 MXN</p>
                <p><small>Stock disponible: 18</small></p>
                <a href="agregar_carrito.php?nombre=Pixel+6a&precio=5899" class="btn-comprar">Comprar Ahora</a>
            </div>
        </div>
    </main>

    <footer>
        <p>Ortega Villanueva César | 5-J | 0879</p>
    </footer>
</body>
</html>