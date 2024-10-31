<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Inicializar la variable del mensaje
$message = '';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'] ?? '';
    $password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

    // Validar que los campos no estén vacíos
    if (!empty($nombre_usuario) && !empty($password)) {
        // Preparar la consulta SQL para comprobar si el nombre de usuario ya existe
        $checkSql = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->execute([$nombre_usuario]);

        // Verificar si el nombre de usuario ya existe
        if ($checkStmt->rowCount() > 0) {
            $message = "Este nombre de usuario ya está en uso. Por favor, elige otro.";
        } else {
            // Preparar la consulta SQL para insertar el usuario sin el correo electrónico
            $sql = "INSERT INTO usuarios (nombre_usuario, password) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);

            // Intentar ejecutar la consulta
            if ($stmt->execute([$nombre_usuario, $password])) {
                // Registro exitoso, redirigir a login.php
                header("Location: index.html");
                exit();
            } else {
                $message = "Error en el registro";
            }
        }
    } else {
        $message = "Por favor, completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <style>
        body {
            height: 100vh; /* Asegura que el body ocupe toda la altura de la ventana */
            background-image: url('avion.jpg'); /* Ruta de la imagen de fondo */
            background-size: cover; /* Escala la imagen para cubrir toda la pantalla */
            background-position: center; /* Centra la imagen */
            font-family: Arial, sans-serif;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente para el formulario */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 400px; /* Ancho máximo del formulario */
            margin: auto; /* Centra el formulario horizontalmente */
            margin-top: 250px;
            text-align: center; /* Centra el texto dentro del formulario */
        }

        h1 {
            color: #4CAF50; /* Color del título */
            margin-bottom: 20px; /* Espacio inferior */
        }

        input[type="text"],
        input[type="password"] {
            width: 100%; /* Ancho completo */
            padding: 10px;
            margin-bottom: 15px; /* Espacio inferior entre campos */
            border: 1px solid #ddd; /* Borde gris claro */
            border-radius: 5px; /* Bordes redondeados */
        }

        button {
            background-color: rgba(76, 175, 80, 0.8); /* Color del botón */
            color: white; /* Color del texto */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            width: 100%; /* Ancho completo del botón */
        }

        button:hover {
            background-color: rgba(69, 160, 73, 0.8); /* Color al pasar el ratón */
        }

        .login-btn {
            display: block; /* Hace que el enlace ocupe toda la línea */
            margin-top: 15px; /* Espacio superior */
            color: #4CAF50; /* Color del enlace */
            text-decoration: none; /* Sin subrayado */
        }

        .message {
            margin-top: 15px; /* Espacio superior para el mensaje */
            color: red; /* Color del mensaje */
        }

    </style>
</head>
<body>
    <form action="register.php" method="post">
        <h1>Registro</h1>
        <input type="text" name="nombre_usuario" placeholder="Nombre de usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Registrarse</button>
        <a href="login.php" class="login-btn">¿Ya tienes una cuenta? Inicia sesión aquí</a> <!-- Botón de inicio de sesión -->
        <?php if (!empty($message)): ?>
            <div class="message">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>
