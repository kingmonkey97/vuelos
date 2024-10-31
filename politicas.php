<?php
session_start();

// Verifica si la sesión está configurada
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php"); // Redirige al login si no está autenticado
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Políticas</title>
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
            border-radius: 10px; /* Bordes redondeados */
            margin: 50px auto; /* Centrar el contenido */
            max-width: 800px; /* Ancho máximo */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra */
        }

        h1 {
            color: #4CAF50;
        }

        h2 {
            color: #333; /* Color para los encabezados secundarios */
        }

        p {
            color: #666; /* Color para el texto de párrafos */
            line-height: 1.5; /* Altura de línea */
        }

        .back-button {
            background-color: rgba(76, 175, 80, 0.8); /* Color semi-transparente */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: rgba(69, 160, 73, 0.8); /* Color semi-transparente */
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
        <h1>Políticas</h1>

        <h2>Política de Privacidad</h2>
        <p>Nos comprometemos a proteger su privacidad. Los datos recopilados son utilizados únicamente para mejorar nuestros servicios.</p>

        <h2>Política de Uso Aceptable</h2>
        <p>El uso de nuestra plataforma debe ser responsable y no debe implicar actividades ilegales o perjudiciales para otros usuarios.</p>

        <h2>Política de Cancelación</h2>
        <p>Los usuarios pueden cancelar su registro en cualquier momento. Para ello, se debe notificar al soporte a través del formulario de contacto.</p>

        <a href="inicio.php" class="back-button">Volver a Inicio</a>
    </div>
</body>
</html>
