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
    <title>Contacto</title>
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
        border-radius: 10px;
        margin: 50px auto;
        
        width: 80%; /* Ajusta el ancho del contenido */
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
    }

    h1 {
        color: #4CAF50;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: calc(100% - 22px); /* Calcula el ancho restando el padding y border */
        padding: 10px;
        margin-bottom: 15px;
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

    .back-button {
        display: inline-block;
        margin-top: 20px;
        background-color: rgba(76, 175, 80, 0.8); /* Color semi-transparente */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
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
        <h1>Contacto</h1>

        <h2>¿Cómo puedo contactarlos?</h2>
        <p>Si tienes alguna consulta o necesitas ayuda, puedes ponerte en contacto con nosotros a través del siguiente formulario:</p>

        <form action="enviar_contacto.php" method="post">
            <h1>formulario falso</h1>
            <label for="nombre">Nombre:</label><br>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea><br><br>

            <input type="submit" value="Enviar">
        </form>

        <h2>Información de Contacto</h2>
        <p>Email: correofalso2.0@tuaplicacion.com</p>
        <p>Teléfono: 123456789</p>

        <a href="inicio.php" class="back-button">Volver a Inicio</a>
        
    </div>
    <br><br>
</body>
</html>
