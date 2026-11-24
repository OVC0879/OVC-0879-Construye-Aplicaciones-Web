<?php
session_start();

if (isset($_GET['nombre']) && isset($_GET['precio'])) {
    $nombre = $_GET['nombre'];
    $precio = (float)$_GET['precio'];

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    if (isset($_SESSION['carrito'][$nombre])) {
        $_SESSION['carrito'][$nombre]['cantidad'] += 1;
    } else {
        $_SESSION['carrito'][$nombre] = [
            'nombre'   => $nombre,
            'precio'   => $precio,
            'cantidad' => 1
        ];
    }
}

header("Location: carrito.php");
exit();
?>