<?php
session_start();
include 'db.php';

// Verifica si el usuario está autenticado
if (!isset($_SESSION['nombre_usuario']) || !isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Página de Inicio</title>
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
        }

        h1 {
            color: #4CAF50;
        }

        .button {
            background-color: rgba(76, 175, 80, 0.8); /* Color semi-transparente */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: rgba(69, 160, 73, 0.8); /* Color semi-transparente */
        }

        .info-panel {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente */
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-top: 50px;
        }

        .testimonios {
            margin-top: 50px;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente */
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 50px;
        }

        .testimonios form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
        }

        .testimonios form button {
            background-color: rgba(76, 175, 80, 0.8); /* Color semi-transparente */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Estilo del contenedor */
        .datetime-container {
            width: 300px; /* Establece un ancho específico */
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            background: rgba(34, 34, 34, 0.8); /* Fondo semi-transparente */
            text-align: center; /* Centra el contenido dentro del contenedor */
            margin-left: 39%;
        }

        /* Estilo de la hora */
        .time {
            font-size: 2.5em;
            font-weight: bold;
            margin-bottom: 10px;
            color: #4CAF50;
            animation: fadeIn 2s ease-out forwards;
        }

        /* Estilo de la fecha */
        .date {
            font-size: 1.2em;
            font-weight: 300;
            color: #aaa;
            animation: fadeIn 2s ease-out forwards;
        }

        /* Animación de aparición */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="navbar">
        
        <a href="inicio.php">Inicio</a>
        <a href="perfil.php">Perfil</a>
        <a href="registro_vuelos.php">Registro</a>
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
        <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?>.</h1>
        <p>Hola, <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?>. Aquí puedes encontrar las últimas novedades.</p><br>
        <a href="welcome.php" class="button">Registra tu vuelo aquí.</a>
        
        <div class="info-panel">
            <h2>Últimas Novedades</h2>
            <ul>
                <li>Nueva política de vuelos nacionales.</li>
                <li>Recuerda que el registro debe hacerse 48 horas antes del vuelo.</li>
                <li>Consulta nuestra sección de ayuda para más información.</li>
            </ul>
        </div>

        <div class="testimonios">
            <h2>Testimonios de Usuarios</h2>

            <!--nuevo testimonio -->
            <form action="agregar_testimonio.php" method="post">
                <textarea name="contenido" rows="4" placeholder="Escribe tu testimonio aquí..." required></textarea>
                <button type="submit">Agregar Testimonio</button>
            </form>

            <!-- Lista de testimonios -->
            <div id="testimonio-lista">
                <?php
                // Consulta obtener los testimonios y los y user
                $sql = "SELECT t.contenido, u.nombre_usuario 
                        FROM testimonios t 
                        JOIN usuarios u ON t.usuario_id = u.id 
                        ORDER BY t.fecha DESC";
                $stmt = $pdo->query($sql);

                // Mostrar cada testimonio en pantalla
                while ($row = $stmt->fetch()) {
                    echo '<blockquote>';
                    echo '<p>"' . htmlspecialchars($row['contenido']) . '"</p>';
                    echo '<cite>- ' . htmlspecialchars($row['nombre_usuario']) . '</cite>';
                    echo '</blockquote>';
                }
                ?>
            </div>
        </div>
    </div>


    <div class="datetime-container">
        <div class="time" id="time"></div>
        <div class="date" id="date"></div>
    </div>

    <script>
        // Actualiza la hora y la fecha cada segundo
        function updateDateTime() {
            const now = new Date();

            // Formatea la hora en formato de 24 horas (HH:MM:SS)
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;

            // Formatea la fecha (día de la semana, mes día, año)
            const dayNames = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
            const monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
            const dayOfWeek = dayNames[now.getDay()];
            const day = now.getDate();
            const month = monthNames[now.getMonth()];
            const year = now.getFullYear();
            const dateString = `${dayOfWeek}, ${day} de ${month} de ${year}`;

            // Actualiza los elementos HTML con la hora y la fecha
            document.getElementById('time').innerText = timeString;
            document.getElementById('date').innerText = dateString;
        }

        // Actualiza la fecha y hora al cargar la página y cada segundo
        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>

    
    <br>
    <br>
</body>
</html>
