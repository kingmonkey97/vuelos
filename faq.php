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
    <title>Preguntas Frecuentes</title>
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
            background-color: rgba(255, 255, 255, 0.9); /* Fondo semi-transparente */
            border-radius: 10px;
            margin: 50px auto; /* Centra el contenido */
            max-width: 800px; /* Limita el ancho del contenido */
        }

        h1 {
            color: #4CAF50;
        }

        h2 {
            color: #333; /* Color para los subtítulos */
        }

        p {
            color: #555; /* Color para los párrafos */
            line-height: 1.5; /* Mejora la legibilidad */
        }

        .back-button {
            background-color: rgba(76, 175, 80, 0.8); /* Color semi-transparente */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block; /* Permite que se comporte como un botón */
            margin-top: 20px; /* Espaciado superior */
        }

        .back-button:hover {
            background-color: rgba(69, 160, 73, 0.8); /* Color semi-transparente */
        }

        /* Animación de aparición */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .content {
            animation: fadeIn 1s ease-out forwards; /* Animación de aparición */
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
        <h1>Preguntas Frecuentes</h1>

        <h2>¿Cómo puedo registrar mi vuelo?</h2>
        <p>Para registrar tu vuelo, dirígete a la pagina de Inicio, oprime el voton "Registra tu vuelo aqui" y completa el formulario con los detalles de tu vuelo. Asegúrate de proporcionar información precisa.</p>

        <h2>¿Qué debo hacer si tengo problemas al registrarme?</h2>
        <p>Si experimentas problemas durante el registro, por favor revisa que todos los campos estén completos y sean correctos. Si el problema persiste, contacta a nuestro soporte técnico.</p>

        <h2>¿Hay un límite de tiempo para registrar mi vuelo?</h2>
        <p>Sí, debes registrar tu vuelo al menos 48 horas antes de la hora de salida programada.</p>

        <h2>¿Puedo cancelar o modificar mi registro?</h2>
        <p>Sí, puedes cancelar o modificar tu registro. Simplemente dirígete a la sección de configuración y selecciona la opción correspondiente.</p>

        <h2>¿Cómo puedo contactar al soporte?</h2>
        <p>Puedes contactar al soporte a través de la sección de contacto en nuestra página. Responderemos a tu consulta lo antes posible.</p>

        <a href="inicio.php" class="back-button">Volver a Inicio</a>
    </div>
</body>
</html>
