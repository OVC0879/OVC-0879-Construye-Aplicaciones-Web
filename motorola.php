<?php session_start(); require_once 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motorola - MobileStore</title>
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
            <li><a href="motorola.php" class="active">Motorola</a></li>
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
            <h2>Catálogo Motorola</h2>
        </div>
        <div class="grid-productos">
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Razr+40+Ultra&precio=22999" class="img-link"><img src="https://m.media-amazon.com/images/I/51QA4hd-avL._AC_UF1000,1000_QL80_.jpg" alt="Razr 40 Ultra"></a>
                <h3>Razr 40 Ultra</h3>
                <p class="precio">$22,999.00 MXN</p>
                <p><small>Stock disponible: 6</small></p>
                <a href="agregar_carrito.php?nombre=Razr+40+Ultra&precio=22999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Edge+50+Pro&precio=12999" class="img-link"><img src="https://i5-mx.walmartimages.com/asr/27ed63f4-614a-4fb4-a493-5ede8b0c0864.491daafb256a2b66bd110c5df1357024.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" alt="Edge 50 Pro"></a>
                <h3>Edge 50 Pro</h3>
                <p class="precio">$12,999.00 MXN</p>
                <p><small>Stock disponible: 10</small></p>
                <a href="agregar_carrito.php?nombre=Edge+50+Pro&precio=12999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Edge+40+Pro&precio=15499" class="img-link"><img src="https://i5-mx.walmartimages.com/asr/4c0f2dad-d625-4ec2-a969-bd66c1d05acb.1214c18d53d47ba32172158b597f79f7.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" alt="Edge 40 Pro"></a>
                <h3>Edge 40 Pro</h3>
                <p class="precio">$15,499.00 MXN</p>
                <p><small>Stock disponible: 8</small></p>
                <a href="agregar_carrito.php?nombre=Edge+40+Pro&precio=15499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Edge+40+Neo&precio=7999" class="img-link"><img src="https://m.media-amazon.com/images/I/71gbLC8j-zL.jpg" alt="Edge 40 Neo"></a>
                <h3>Edge 40 Neo</h3>
                <p class="precio">$7,999.00 MXN</p>
                <p><small>Stock disponible: 12</small></p>
                <a href="agregar_carrito.php?nombre=Edge+40+Neo&precio=7999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Edge+30+Ultra&precio=13999" class="img-link"><img src="https://m.media-amazon.com/images/I/61xM0fPhXeL._AC_UF894,1000_QL80_.jpg" alt="Edge 30 Ultra"></a>
                <h3>Edge 30 Ultra</h3>
                <p class="precio">$13,999.00 MXN</p>
                <p><small>Stock disponible: 7</small></p>
                <a href="agregar_carrito.php?nombre=Edge+30+Ultra&precio=13999" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Moto+G84+5G&precio=5499" class="img-link"><img src="https://i5-mx.walmartimages.com/asr/f6f64a2c-156f-406f-9079-d51a11e964ee.a3691485248dc1eadd0f35b8c55e6d46.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" alt="Moto G84 5G"></a>
                <h3>Moto G84 5G</h3>
                <p class="precio">$5,499.00 MXN</p>
                <p><small>Stock disponible: 18</small></p>
                <a href="agregar_carrito.php?nombre=Moto+G84+5G&precio=5499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Moto+G54+5G&precio=4299" class="img-link"><img src="https://m.media-amazon.com/images/I/61ZuDpDf+RL._AC_UF894,1000_QL80_.jpg" alt="Moto G54 5G"></a>
                <h3>Moto G54 5G</h3>
                <p class="precio">$4,299.00 MXN</p>
                <p><small>Stock disponible: 22</small></p>
                <a href="agregar_carrito.php?nombre=Moto+G54+5G&precio=4299" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Moto+G24+Power&precio=3499" class="img-link"><img src="https://http2.mlstatic.com/D_NQ_NP_841556-MLA99461748780_112025-O.webp" alt="Moto G24 Power"></a>
                <h3>Moto G24 Power</h3>
                <p class="precio">$3,499.00 MXN</p>
                <p><small>Stock disponible: 25</small></p>
                <a href="agregar_carrito.php?nombre=Moto+G24+Power&precio=3499" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Moto+G14&precio=2899" class="img-link"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQo2xV_ZB5yrpL6kbZZYVvwUfIv5OC_9_CbHthLzfhSBTgi1Y5y4tD-6ws&s=10" alt="Moto G14"></a>
                <h3>Moto G14</h3>
                <p class="precio">$2,899.00 MXN</p>
                <p><small>Stock disponible: 30</small></p>
                <a href="agregar_carrito.php?nombre=Moto+G14&precio=2899" class="btn-comprar">Comprar Ahora</a>
            </div>
            <div class="card-celular">
                <a href="agregar_carrito.php?nombre=Moto+E13&precio=1999" class="img-link"><img src="https://m.media-amazon.com/images/I/71GcbV7rixL._AC_UF1000,1000_QL80_.jpg" alt="Moto E13"></a>
                <h3>Moto E13</h3>
                <p class="precio">$1,999.00 MXN</p>
                <p><small>Stock disponible: 35</small></p>
                <a href="agregar_carrito.php?nombre=Moto+E13&precio=1999" class="btn-comprar">Comprar Ahora</a>
            </div>
        </div>
    </main>

    <footer>
        <p>Ortega Villanueva César | 5-J | 0879</p>
    </footer>
</body>
</html>