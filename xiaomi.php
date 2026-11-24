<?php session_start(); require_once 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xiaomi - MobileStore</title>
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
            <li><a href="xiaomi.php" class="active">Xiaomi</a></li>
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
            <h2>Catálogo Xiaomi</h2>
        </div>
        <div class="grid-productos">
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Xiaomi+14+Ultra&precio=26999" class="img-link"><img src="https://m.media-amazon.com/images/I/51pOOfBgGzL._AC_UF1000,1000_QL80_.jpg" alt="Xiaomi 14 Ultra"></a>
                <h3>Xiaomi 14 Ultra</h3>
                <p class="precio">$26,999.00 MXN</p>
                <p><small>Stock disponible: 4</small></p>
                <a href="agregar_carrito.php?nombre=Xiaomi+14+Ultra&precio=26999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Xiaomi+14&precio=21499" class="img-link"><img src="https://m.media-amazon.com/images/I/51HXDYzmFbL.jpg" alt="Xiaomi 14"></a>
                <h3>Xiaomi 14</h3>
                <p class="precio">$21,499.00 MXN</p>
                <p><small>Stock disponible: 5</small></p>
                <a href="agregar_carrito.php?nombre=Xiaomi+14&precio=21499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Xiaomi+13T+Pro&precio=14999" class="img-link"><img src="https://i5-mx.walmartimages.com/asr/d12a6957-acbb-4412-b9d2-352228698417.911939c40bd441cbca262c8583dc8984.jpeg" alt="Xiaomi 13T Pro"></a>
                <h3>Xiaomi 13T Pro</h3>
                <p class="precio">$14,999.00 MXN</p>
                <p><small>Stock disponible: 9</small></p>
                <a href="agregar_carrito.php?nombre=Xiaomi+13T+Pro&precio=14999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=POCO+F6+Pro&precio=11499" class="img-link"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRp85BXROtULUknKddN3sgIKsX8kgI8vnUxOhEf7MAjA&s=10" alt="POCO F6 Pro"></a>
                <h3>POCO F6 Pro</h3>
                <p class="precio">$11,499.00 MXN</p>
                <p><small>Stock disponible: 12</small></p>
                <a href="agregar_carrito.php?nombre=POCO+F6+Pro&precio=11499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=POCO+X6+Pro&precio=7999" class="img-link"><img src="https://i5-mx.walmartimages.com/asr/fea66666-0197-480c-b740-8077879001e7.2ee810c4c6ecbf40b1aabab3f8331ae0.png" alt="POCO X6 Pro"></a>
                <h3>POCO X6 Pro</h3>
                <p class="precio">$7,999.00 MXN</p>
                <p><small>Stock disponible: 15</small></p>
                <a href="agregar_carrito.php?nombre=POCO+X6+Pro&precio=7999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Redmi+Note+13+Pro%2B&precio=9999" class="img-link"><img src="https://m.media-amazon.com/images/I/71Wr4aRubuL.jpg" alt="Redmi Note 13 Pro+"></a>
                <h3>Redmi Note 13 Pro+</h3>
                <p class="precio">$9,999.00 MXN</p>
                <p><small>Stock disponible: 14</small></p>
                <a href="agregar_carrito.php?nombre=Redmi+Note+13+Pro%2B&precio=9999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Redmi+Note+13+Pro&precio=7499" class="img-link"><img src="https://m.media-amazon.com/images/I/71LCkAy9feL._AC_UF1000,1000_QL80_.jpg" alt="Redmi Note 13 Pro"></a>
                <h3>Redmi Note 13 Pro</h3>
                <p class="precio">$7,499.00 MXN</p>
                <p><small>Stock disponible: 18</small></p>
                <a href="agregar_carrito.php?nombre=Redmi+Note+13+Pro&precio=7499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Redmi+Note+13&precio=4899" class="img-link"><img src="https://m.media-amazon.com/images/I/71d55STSTPL.jpg" alt="Redmi Note 13"></a>
                <h3>Redmi Note 13</h3>
                <p class="precio">$4,899.00 MXN</p>
                <p><small>Stock disponible: 25</small></p>
                <a href="agregar_carrito.php?nombre=Redmi+Note+13&precio=4899" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Redmi+13C&precio=3199" class="img-link"><img src="https://m.media-amazon.com/images/I/51rs8kVIdvL._AC_UF1000,1000_QL80_.jpg" alt="Redmi 13C"></a>
                <h3>Redmi 13C</h3>
                <p class="precio">$3,199.00 MXN</p>
                <p><small>Stock disponible: 30</small></p>
                <a href="agregar_carrito.php?nombre=Redmi+13C&precio=3199" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=POCO+M6+Pro&precio=4299" class="img-link"><img src="https://chobs.mistoremx.com/images/202402/goods_img/0_P_1708388835817.jpg" alt="POCO M6 Pro"></a>
                <h3>POCO M6 Pro</h3>
                <p class="precio">$4,299.00 MXN</p>
                <p><small>Stock disponible: 20</small></p>
                <a href="agregar_carrito.php?nombre=POCO+M6+Pro&precio=4299" class="btn-comprar">Comprar Ahora</a>
            </div>
        </div>
    </main>

    <footer>
        <p>Ortega Villanueva César | 5-J | 0879</p>
    </footer>
</body>
</html>