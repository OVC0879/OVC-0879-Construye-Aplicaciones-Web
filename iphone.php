<?php session_start(); require_once 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apple/iPhone - MobileStore</title>
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
            <li><a href="iphone.php" class="active">iPhone</a></li>
            <li><a href="samsung.php">Samsung</a></li>
            <li><a href="xiaomi.php">Xiaomi</a></li>
            <li><a href="motorola.php">Motorola</a></li>
            <li><a href="google.php">Google</a></li>
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
            <h2>Catálogo Apple/iPhone</h2>
        </div>
        <div class="grid-productos">
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=iPhone+15+Pro+Max&precio=28999" class="img-link"><img src="https://m.media-amazon.com/images/I/71ADf9xkbOL.jpg" alt="iPhone 15 Pro Max"></a>
                <h3>iPhone 15 Pro Max</h3>
                <p class="precio">$28,999.00 MXN</p>
                <p><small>Stock disponible: 8</small></p>
                <a href="agregar_carrito.php?nombre=iPhone+15+Pro+Max&precio=28999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=iPhone+15+Pro&precio=23999" class="img-link"><img src="https://m.media-amazon.com/images/I/71ADf9xkbOL._AC_UF1000,1000_QL80_.jpg" alt="iPhone 15 Pro"></a>
                <h3>iPhone 15 Pro</h3>
                <p class="precio">$23,999.00 MXN</p>
                <p><small>Stock disponible: 10</small></p>
                <a href="agregar_carrito.php?nombre=iPhone+15+Pro&precio=23999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=iPhone+15+Plus&precio=21499" class="img-link"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4PKHXsE4eOXhX1-BdE9dASQ6ipcInzU5lKIe2tJASBQ&s=10" alt="iPhone 15 Plus"></a>
                <h3>iPhone 15 Plus</h3>
                <p class="precio">$21,499.00 MXN</p>
                <p><small>Stock disponible: 12</small></p>
                <a href="agregar_carrito.php?nombre=iPhone+15+Plus&precio=21499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=iPhone+15&precio=19499" class="img-link"><img src="https://m.media-amazon.com/images/I/41+jLq6yJKL._AC_UF1000,1000_QL80_.jpg" alt="iPhone 15"></a>
                <h3>iPhone 15</h3>
                <p class="precio">$19,499.00 MXN</p>
                <p><small>Stock disponible: 15</small></p>
                <a href="agregar_carrito.php?nombre=iPhone+15&precio=19499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=iPhone+14+Pro+Max&precio=24999" class="img-link"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQU5EA2jQIRkQfcQHrh7nL6XxJKLEIfEn2RVO7XJRGriQ&s=10" alt="iPhone 14 Pro Max"></a>
                <h3>iPhone 14 Pro Max</h3>
                <p class="precio">$24,999.00 MXN</p>
                <p><small>Stock disponible: 6</small></p>
                <a href="agregar_carrito.php?nombre=iPhone+14+Pro+Max&precio=24999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=iPhone+14&precio=16999" class="img-link"><img src="https://m.media-amazon.com/images/I/618Bb+QzCmL._AC_UF894,1000_QL80_.jpg" alt="iPhone 14"></a>
                <h3>iPhone 14</h3>
                <p class="precio">$16,999.00 MXN</p>
                <p><small>Stock disponible: 14</small></p>
                <a href="agregar_carrito.php?nombre=iPhone+14&precio=16999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=iPhone+13+Pro&precio=17999" class="img-link"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiZxXbCv6YnrVGYQ57LF4hiWepBGz_7AbtRS6CMyzGGkJXjZp2P8GwfRw&s=10" alt="iPhone 13 Pro"></a>
                <h3>iPhone 13 Pro</h3>
                <p class="precio">$17,999.00 MXN</p>
                <p><small>Stock disponible: 9</small></p>
                <a href="agregar_carrito.php?nombre=iPhone+13+Pro&precio=17999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=iPhone+13&precio=13999" class="img-link"><img src="https://m.media-amazon.com/images/I/516QZcrv+dL.jpg" alt="iPhone 13"></a>
                <h3>iPhone 13</h3>
                <p class="precio">$13,999.00 MXN</p>
                <p><small>Stock disponible: 18</small></p>
                <a href="agregar_carrito.php?nombre=iPhone+13&precio=13999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=iPhone+12&precio=10999" class="img-link"><img src="https://m.media-amazon.com/images/I/61QGvLAdiNL._AC_UF1000,1000_QL80_.jpg" alt="iPhone 12"></a>
                <h3>iPhone 12</h3>
                <p class="precio">$10,999.00 MXN</p>
                <p><small>Stock disponible: 20</small></p>
                <a href="agregar_carrito.php?nombre=iPhone+12&precio=10999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=iPhone+SE+(3ra+gen)&precio=8499" class="img-link"><img src="https://m.media-amazon.com/images/I/41fPmxqWeHL._AC_UF1000,1000_QL80_.jpg" alt="iPhone SE (3ra gen)"></a>
                <h3>iPhone SE (3ra gen)</h3>
                <p class="precio">$8,499.00 MXN</p>
                <p><small>Stock disponible: 25</small></p>
                <a href="agregar_carrito.php?nombre=iPhone+SE+(3ra+gen)&precio=8499" class="btn-comprar">Comprar Ahora</a>
            </div>
        </div>
    </main>

    <footer>
        <p>Ortega Villanueva César | 5-J | 0879</p>
    </footer>
</body>
</html>