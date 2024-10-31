<?php
session_start();

// Verifica si la sesión está configurada
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php"); // Redirige al login si no está autenticado
    exit();
}

/*
include 'db.php'; // Asegúrate de que este archivo se incluye correctamente
*/

// Aquí podrías obtener la información del usuario desde la base de datos

$nombre_usuario = $_SESSION['nombre_usuario'];
/*
$email_usuario = ""; // Inicializa la variable para el correo
*/
$mensaje = ""; // Definir la variable
/*

try {
    // Consulta para obtener el correo del usuario
    $sql = "SELECT email FROM usuarios WHERE nombre_usuario = :nombre_usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre_usuario', $nombre_usuario);
    $stmt->execute();

    // Verifica si se encontró algún resultado
    if ($stmt->rowCount() > 0) {
        // Guardar el correo del usuario en una variable
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $email_usuario = $row['email'];
    } else {
        $mensaje = "No se encontró el usuario."; // Mensaje de error
    }
} catch (PDOException $e) {
    echo "Error en la consulta: " . $e->getMessage();
}



$nombre_usuario = $_SESSION['nombre_usuario']; // Obtener el nombre del usuario de la sesión
*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
    <style>
        body {
            height: 100vh; /* Asegura que el body ocupe toda la altura de la ventana */
            background-image: url('avion.jpg'); /* Ruta de la imagen de fondo */
            background-size: cover; /* Escala la imagen para cubrir toda la pantalla */
            background-position: center; /* Centra la imagen */
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: rgba(76, 175, 80, 0.8); /* Color semi-transparente */
            padding: 10px;
            text-align: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 5px;
        }

        .dropdown {
            display: inline-block;
            position: relative;
        }

        .dropbtn {
            background-color: rgba(76, 175, 80, 0.8); /* Color semi-transparente */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .content {
            padding: 20px;
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente */
            border-radius: 5px;
            margin: 50px auto; /* Centra el contenido */
            width: 80%; /* Controla el ancho del contenido */
            max-width: 600px; /* Máximo ancho del contenido */
        }

        h1 {
            color: #4CAF50;
        }

        input[type="password"],
        input[type="text"] {
            width: 100%; /* Ancho completo */
            padding: 10px;
            margin: 10px 0; /* Espacio entre los elementos */
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: rgba(76, 175, 80, 0.8); /* Color semi-transparente */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: rgba(69, 160, 73, 0.8); /* Color semi-transparente */
        }

        .info-panel {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente */
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-top: 50px;
        }

        .mensaje {
            color: red; /* Color de mensaje de error */
            margin-top: 10px;
        }

        /* Estilos para el formulario */
        form {
            display: flex;
            flex-direction: column; /* Coloca los elementos en columna */
            align-items: center; /* Centra los elementos */
        }

    </style>

</head>
<body>
    <div class="navbar">
        <a href="inicio.php">Inicio</a>
        <a href="perfil.php">Perfil</a>
        <a href="registro_vuelos.php">Configuración</a>
        <a href="logout.php">Cerrar sesión</a>
        <div class="dropdown">
            <button class="dropbtn">Más opciones</button>
            <div class="dropdown-content">
                <a href="faq.php">Preguntas Frecuentes</a>
                <a href="contacto.php">Contacto</a>
                <a href="politicas.php">Políticas</a>
            </div>
        </div>
    </div>


    <div class="content">
        <h1>Este es tu perfil, <?php echo htmlspecialchars($nombre_usuario); ?></h1>

        <form action="cambiar_contrasena.php" method="post">
            <h2>Cambiar Contraseña</h2>
            <label for="nombre">Nombre:</label>
            <p><?php echo htmlspecialchars($nombre_usuario); ?></p>
            <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($nombre_usuario); ?>">
            <br>
            <label for="password_actual">Contraseña actual:</label>
            <input type="password" id="password_actual" name="password_actual" required>
            <br>

            <label for="nueva_contrasena">Nueva contraseña:</label>
            <input type="password" id="nueva_contrasena" name="nueva_contrasena" required>
            <br>

            <label for="confirmar_contrasena">Confirmar nueva contraseña:</label>
            <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required>
            <br>

            <input type="submit" value="Cambiar Contraseña">
            <br>
            <!-- Espacio para mostrar mensajes -->
            <?php if (isset($_GET['mensaje'])): ?>
                <div style="color: red;"><?php echo htmlspecialchars($_GET['mensaje']); ?></div>
            <?php endif; ?>
        </form>

    </div>
</body>
</html>
