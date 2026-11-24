<?php
session_start();
require_once 'conexion.php';

if (isset($_GET['accion']) && isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    if (isset($_SESSION['carrito'][$nombre])) {
        if ($_GET['accion'] == 'sumar') {
            $_SESSION['carrito'][$nombre]['cantidad']++;
        } elseif ($_GET['accion'] == 'restar') {
            $_SESSION['carrito'][$nombre]['cantidad']--;
            if ($_SESSION['carrito'][$nombre]['cantidad'] <= 0) {
                unset($_SESSION['carrito'][$nombre]);
            }
        } elseif ($_GET['accion'] == 'eliminar') {
            unset($_SESSION['carrito'][$nombre]);
        }
    }
    header("Location: carrito.php");
    exit();
}

$mensaje_compra = "";
if (isset($_POST['finalizar_compra']) && !empty($_SESSION['carrito'])) {
    $total_venta = 0;
    $usuario_compra = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Invitado';

    $stmt_stock = $conexion->prepare("UPDATE productos SET stock = GREATEST(stock - :cantidad, 0) WHERE nombre = :nombre");

    foreach ($_SESSION['carrito'] as $item) {
        $cantidad = (int)$item['cantidad'];
        $total_venta += ($item['precio'] * $cantidad);

        $stmt_stock->execute([
            ':cantidad' => $cantidad,
            ':nombre'   => $item['nombre']
        ]);
    }

    $stmt_venta = $conexion->prepare("INSERT INTO ventas (usuario, total) VALUES (:usuario, :total)");
    $stmt_venta->execute([
        ':usuario' => $usuario_compra,
        ':total'   => $total_venta
    ]);

    unset($_SESSION['carrito']);
    $mensaje_compra = "¡Compra registrada con éxito en la base de datos! Gracias por comprar en MobileStore.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - MobileStore</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; color: #333; min-height: 100vh; display: flex; flex-direction: column; }
        .navbar { background-color: #1a252f; display: flex; justify-content: space-between; align-items: center; padding: 15px 40px; position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 10px rgba(0,0,0,0.15); }
        .navbar .logo { color: #fff; font-size: 24px; font-weight: bold; text-decoration: none; }
        .navbar .logo span { color: #3498db; }
        .nav-links { list-style: none; display: flex; align-items: center; gap: 15px; }
        .nav-links li a { color: #ecf0f1; text-decoration: none; font-size: 15px; font-weight: 600; padding: 8px 12px; border-radius: 4px; transition: 0.3s; }
        .nav-links li a:hover, .nav-links li a.active { background-color: #3498db; color: white; }
        .btn-sesion { background-color: #27ae60 !important; }
        .container { flex: 1; width: 100%; max-width: 1000px; margin: 40px auto; padding: 25px; background: white; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.06); }
        h2 { border-bottom: 3px solid #3498db; padding-bottom: 10px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 12px; text-align: center; border-bottom: 1px solid #ddd; }
        th { background-color: #1a252f; color: white; }
        .btn-cant { background: #3498db; color: white; padding: 4px 10px; text-decoration: none; border-radius: 4px; font-weight: bold; }
        .btn-elim { background: #e74c3c; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; }
        .total-box { text-align: right; font-size: 22px; font-weight: bold; margin: 20px 0; color: #27ae60; }
        .btn-pagar { background: #27ae60; color: white; border: none; padding: 12px 25px; font-size: 16px; font-weight: bold; border-radius: 5px; cursor: pointer; }
        .alerta { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; font-weight: bold; }
        footer { background-color: #1a252f; color: #bdc3c7; text-align: center; padding: 20px; margin-top: auto; }
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
            <li><a href="google.php">Google</a></li>
            <li><a href="carrito.php" class="active">Carrito (<?php echo isset($_SESSION['carrito']) ? array_sum(array_column($_SESSION['carrito'], 'cantidad')) : 0; ?>)</a></li>
            <?php if(isset($_SESSION['nombre'])): ?>
                <li><a href="logout.php" class="btn-sesion">Salir (<?php echo htmlspecialchars($_SESSION['nombre']); ?>)</a></li>
            <?php else: ?>
                <li><a href="login.php" class="btn-sesion">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <main class="container">
        <h2>Tu Carrito de Compras</h2>
        <?php if ($mensaje_compra): ?>
            <div class="alerta"><?php echo $mensaje_compra; ?></div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['carrito'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total = 0;
                    foreach ($_SESSION['carrito'] as $item): 
                        $subtotal = $item['precio'] * $item['cantidad'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                            <td>$<?php echo number_format($item['precio'], 2); ?> MXN</td>
                            <td>
                                <a href="carrito.php?accion=restar&nombre=<?php echo urlencode($item['nombre']); ?>" class="btn-cant">-</a>
                                <span style="margin: 0 10px;"><?php echo $item['cantidad']; ?></span>
                                <a href="carrito.php?accion=sumar&nombre=<?php echo urlencode($item['nombre']); ?>" class="btn-cant">+</a>
                            </td>
                            <td>$<?php echo number_format($subtotal, 2); ?> MXN</td>
                            <td>
                                <a href="carrito.php?accion=eliminar&nombre=<?php echo urlencode($item['nombre']); ?>" class="btn-elim">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="total-box">
                Total a pagar: $<?php echo number_format($total, 2); ?> MXN
            </div>

            <form method="POST" style="text-align: right;">
                <button type="submit" name="finalizar_compra" class="btn-pagar">Finalizar Compra</button>
            </form>
        <?php else: ?>
            <p>Tu carrito está vacío. Selecciona algún celular de nuestro catálogo para comenzar.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p>Ortega Villanueva César | 5-J | 0879</p>
    </footer>
</body>
</html>