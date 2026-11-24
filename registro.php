<?php
session_start();
require_once 'conexion.php';
$mensaje = '';
$tipo_mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = trim($_POST['nombre']);
    $email    = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if (!empty($nombre) && !empty($email) && !empty($_POST['password'])) {
        try {
            $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)");
            $stmt->execute([
                ':nombre'   => $nombre,
                ':email'    => $email,
                ':password' => $password
            ]);
            $mensaje = "¡Registro exitoso! Puedes iniciar sesión.";
            $tipo_mensaje = 'exito';
        } catch (PDOException $e) {
            $mensaje = "Error: El correo ya está registrado o falló la inserción.";
            $tipo_mensaje = 'error';
        }
    } else {
        $mensaje = "Por favor completa todos los campos.";
        $tipo_mensaje = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - MobileStore</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #1a252f;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 40px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        .navbar .logo {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .navbar .logo span {
            color: #3498db;
        }

        .nav-links {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-links li a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            padding: 8px 12px;
            border-radius: 4px;
            transition: 0.3s;
        }

        .nav-links li a:hover, .nav-links li a.active {
            background-color: #3498db;
            color: white;
        }

        .btn-sesion {
            background-color: #27ae60 !important;
        }

        .main-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .register-card {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 400px;
        }

        .register-card h2 {
            text-align: center;
            color: #1a252f;
            margin-bottom: 20px;
            font-size: 26px;
        }

        .msg-alerta {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
        }

        .msg-exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .msg-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #3498db;
        }

        .btn-submit {
            width: 100%;
            background-color: #1a252f;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background-color: #3498db;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .login-link a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #1a252f;
            color: #bdc3c7;
            text-align: center;
            padding: 20px;
        }
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
            <li><a href="carrito.php">Carrito (<?php echo isset($_SESSION['carrito']) ? array_sum(array_column($_SESSION['carrito'], 'cantidad')) : 0; ?>)</a></li>
            <li><a href="login.php" class="btn-sesion">Iniciar Sesión</a></li>
        </ul>
    </nav>

    <div class="main-container">
        <div class="register-card">
            <h2>Crear Cuenta</h2>

            <?php if ($mensaje): ?>
                <div class="msg-alerta <?php echo ($tipo_mensaje === 'exito') ? 'msg-exito' : 'msg-error'; ?>">
                    <?php echo htmlspecialchars($mensaje); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="registro.php">
                <div class="form-group">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" id="nombre" name="nombre" >
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" >
                </div>

                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" >
                </div>

                <button type="submit" class="btn-submit">Registrarse</button>
            </form>

            <div class="login-link">
                ¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>
            </div>
        </div>
    </div>

    <footer>
        <p>Ortega Villanueva César | 5-J | 0879</p>
    </footer>
</body>
</html>