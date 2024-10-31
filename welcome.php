<?php
session_start(); // Asegúrate de que esto esté al principio del archivo

// Verifica si la sesión está configurada
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php"); // Redirige al login si no está autenticado
    exit();
}

// Capturar el mensaje y luego borrarlo de la sesión
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : '';
unset($_SESSION['mensaje']); // Borrar el mensaje después de usarlo
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <style>

        body {
            height: 100vh; /* Asegura que el body ocupe toda la altura de la ventana */
            background-image: url('avion.jpg'); /* Ruta de la imagen de fondo */
            background-size: cover; /* Escala la imagen para cubrir toda la pantalla */
            background-position: center; /* Centra la imagen */
            font-family: Arial, sans-serif;
            margin: 0; /* Elimina márgenes por defecto */
        }

        .navbar {
            display: flex; /* Usar flexbox para la barra de navegación */
            justify-content: center; /* Centrar contenido */
            background-color: rgba(76, 175, 80, 0.8);/* Fondo semi-transparente */
            padding: 10px; /* Espaciado interno */
            position: relative; /* Para posicionar el dropdown */
        }

        .navbar a {
            color: white; /* Color de los enlaces */
            text-decoration: none; /* Sin subrayado */
            padding: 14px 20px; /* Espaciado interno para los enlaces */
            border-radius: 5px; /* Bordes redondeados */
            transition: background-color 0.3s; /* Efecto de transición */
        }

        .navbar a:hover {
            background-color: rgba(76, 175, 80, 0.3); /* Color al pasar el mouse */
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

        h1 {
            color: #4CAF50;
            text-align: center; /* Centra el título */
            margin-top: 20px; /* Espacio superior */
        }

        form {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente */
            border-radius: 10px; /* Bordes redondeados */
            padding: 20px; /* Espaciado interno */
            max-width: 400px; /* Ancho máximo del formulario */
            margin: 20px auto; /* Centra el formulario en la pantalla */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Sombra para el formulario */
        }

        label {
            display: block; /* Hacer que cada etiqueta ocupe una línea completa */
            margin-bottom: 5px; /* Espacio inferior */
            color: #333; /* Color del texto */
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%; /* Ocupa todo el ancho disponible */
            padding: 10px; /* Espaciado interno */
            margin-bottom: 15px; /* Espacio inferior */
            border: 1px solid #ccc; /* Borde gris claro */
            border-radius: 5px; /* Bordes redondeados */
            box-sizing: border-box; /* Incluye padding en el tamaño total */
        }

        input[type="radio"] {
            margin-right: 5px; /* Espacio a la derecha de los botones de radio */
        }

        input[type="submit"] {
            background-color: rgba(76, 175, 80, 0.8); /* Color semi-transparente */
            color: white; /* Color del texto */
            padding: 10px 20px; /* Espaciado interno */
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            cursor: pointer; /* Cambia el cursor a puntero */
            transition: background-color 0.3s; /* Efecto de transición */
            width: 100%; /* Ocupa todo el ancho disponible */
        }

        input[type="submit"]:hover {
            background-color: rgba(69, 160, 73, 0.8); /* Color al pasar el mouse */
        }

        /* Estilo para el mensaje de éxito o error */
        .message {
            margin-top: 20px;
            color: green; /* Color del mensaje */
            text-align: center; 
            border: black 1px;

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

    <h1>¡Hola, <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?>, registra tu vuelo aqui!</h1>

    <!-- Formulario para ingresar datos -->
    <form action="recoger2.php" method="post">
        <label>Digite su Nombre y apellidos:</label>
        <input type="text" name="nombre" size="20" placeholder="Digite nombre" required /><br/><br/>

        <label>Digite su Dirección:</label>
        <input type="text" name="direccion" size="20" placeholder="Digite Dirección" required /><br/><br/>

        <label>Digite su Edad:</label>
        <input type="number" name="Edad" min="1" max="90" required placeholder="Edad" /><br/><br/>

        <label>Seleccione fecha de viaje:</label>
        <input type="date" name="Fecha" required /><br/><br/>

        <label for="VIP">¿Es usted un cliente VIP?</label><br/>
        <input type="radio" name="VIP" value="si" required> Si<br/>
        <input type="radio" name="VIP" value="no"> No<br/><br/>

        <label>Seleccione Ciudad Destino:</label><br/>
        <select name="Provincia" required>
            <option value="">Seleccione una ciudad</option>
            <option value="Madrid">Madrid</option>
            <option value="Sevilla">Sevilla</option>
            <option value="Bilbao">Bilbao</option>
            <option value="Barcelona">Barcelona</option>
        </select>
        <br/><br/>

        <input type="submit" value="Guardar!!" />
        <!-- Mostrar el mensaje de éxito o error -->
        <?php if ($mensaje): ?>
            <div style="margin-top: 20px; color: green; text-align: center;"><?= htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>
    </form>

    
    text-align: center; 
    border: black 1px;
</body>
</html>
