<?php session_start(); require_once 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samsung Galaxy - MobileStore</title>
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
            <li><a href="samsung.php" class="active">Samsung</a></li>
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
            <h2>Catálogo Samsung Galaxy</h2>
        </div>
        <div class="grid-productos">
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Galaxy+S24+Ultra&precio=28999" class="img-link"><img src="https://m.media-amazon.com/images/I/61v0ePQaUyL._AC_UF1000,1000_QL80_.jpg" alt="Galaxy S24 Ultra"></a>
                <h3>Galaxy S24 Ultra</h3>
                <p class="precio">$28,999.00 MXN</p>
                <p><small>Stock disponible: 8</small></p>
                <a href="agregar_carrito.php?nombre=Galaxy+S24+Ultra&precio=28999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Galaxy+S24%2B&precio=23499" class="img-link"><img src="https://m.media-amazon.com/images/I/51wQxCsDMSL.jpg" alt="Galaxy S24+"></a>
                <h3>Galaxy S24+</h3>
                <p class="precio">$23,499.00 MXN</p>
                <p><small>Stock disponible: 10</small></p>
                <a href="agregar_carrito.php?nombre=Galaxy+S24%2B&precio=23499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Galaxy+S24&precio=19499" class="img-link"><img src="https://m.media-amazon.com/images/I/51bLsqhXk+L._AC_UF894,1000_QL80_.jpg" alt="Galaxy S24"></a>
                <h3>Galaxy S24</h3>
                <p class="precio">$19,499.00 MXN</p>
                <p><small>Stock disponible: 12</small></p>
                <a href="agregar_carrito.php?nombre=Galaxy+S24&precio=19499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Galaxy+Z+Fold5&precio=32999" class="img-link"><img src="https://m.media-amazon.com/images/I/51sdytGvKML._AC_UF1000,1000_QL80_.jpg" alt="Galaxy Z Fold5"></a>
                <h3>Galaxy Z Fold5</h3>
                <p class="precio">$32,999.00 MXN</p>
                <p><small>Stock disponible: 5</small></p>
                <a href="agregar_carrito.php?nombre=Galaxy+Z+Fold5&precio=32999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Galaxy+Z+Flip5&precio=20999" class="img-link"><img src="https://m.media-amazon.com/images/I/51kso67o64L.jpg" alt="Galaxy Z Flip5"></a>
                <h3>Galaxy Z Flip5</h3>
                <p class="precio">$20,999.00 MXN</p>
                <p><small>Stock disponible: 7</small></p>
                <a href="agregar_carrito.php?nombre=Galaxy+Z+Flip5&precio=20999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Galaxy+S23+FE&precio=12999" class="img-link"><img src="https://m.media-amazon.com/images/I/51l6YHB2x4L.jpg" alt="Galaxy S23 FE"></a>
                <h3>Galaxy S23 FE</h3>
                <p class="precio">$12,999.00 MXN</p>
                <p><small>Stock disponible: 15</small></p>
                <a href="agregar_carrito.php?nombre=Galaxy+S23+FE&precio=12999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Galaxy+A55+5G&precio=8999" class="img-link"><img src="https://m.media-amazon.com/images/I/61COp0E7UxL._AC_UF894,1000_QL80_.jpg" alt="Galaxy A55 5G"></a>
                <h3>Galaxy A55 5G</h3>
                <p class="precio">$8,999.00 MXN</p>
                <p><small>Stock disponible: 18</small></p>
                <a href="agregar_carrito.php?nombre=Galaxy+A55+5G&precio=8999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Galaxy+A54&precio=7499" class="img-link"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2TvmpqrJhOc16NEPAF5A2P3krvuXbWEKBXMsJfoXFuw&s=10" alt="Galaxy A54"></a>
                <h3>Galaxy A54</h3>
                <p class="precio">$7,499.00 MXN</p>
                <p><small>Stock disponible: 20</small></p>
                <a href="agregar_carrito.php?nombre=Galaxy+A54&precio=7499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Galaxy+A35&precio=5999" class="img-link"><img src="https://m.media-amazon.com/images/I/61XoDM+DVaL._AC_UF894,1000_QL80_.jpg" alt="Galaxy A35"></a>
                <h3>Galaxy A35</h3>
                <p class="precio">$5,999.00 MXN</p>
                <p><small>Stock disponible: 22</small></p>
                <a href="agregar_carrito.php?nombre=Galaxy+A35&precio=5999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Galaxy+A15&precio=3699" class="img-link"><img src="https://i5-mx.walmartimages.com/asr/f6941f86-8598-4093-80bb-e94ee328dd2b.0ebb0501766decab5f1d7742bce2cb96.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" alt="Galaxy A15"></a>
                <h3>Galaxy A15</h3>
                <p class="precio">$3,699.00 MXN</p>
                <p><small>Stock disponible: 30</small></p>
                <a href="agregar_carrito.php?nombre=Galaxy+A15&precio=3699" class="btn-comprar">Comprar Ahora</a>
            </div>
        </div>
    </main>

    <footer>
        <p>Ortega Villanueva César | 5-J | 0879</p>
    </footer>
</body>
</html>