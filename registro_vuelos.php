<?php
session_start(); // Asegúrate de que esto esté al principio del archivo

// Verifica si la sesión está configurada
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php"); // Redirige al login si no está autenticado
    exit();
}

// Incluir el conector a la base de datos
include 'db.php'; // Asegúrate de que este es el archivo correcto

// Consultar los registros de vuelos
$query = "SELECT * FROM compania";
$stmt = $pdo->prepare($query);
$stmt->execute();
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Vuelos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        table {
            width: 100%; /* Ancho completo */
            border-collapse: collapse; /* Colapsa los bordes */
            margin-top: 20px; /* Espacio superior */
        }

        th, td {
            border: 1px solid #ddd; /* Bordes de las celdas */
            padding: 12px; /* Espacio interno de las celdas */
            text-align: left; /* Alineación del texto */
        }

        th {
            background-color: rgba(76, 175, 80, 0.8); /* Fondo de los encabezados */
            color: white; /* Color del texto */
        }

        td {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente */
        }

        td a {
            color: white; /* Color del texto de los enlaces */
        }

        td a:hover {
            text-decoration: underline; /* Subrayar al pasar el ratón */
        }

        /* Estilo del contenedor */
        .datetime-container {
            width: 300px; /* Establece un ancho específico */
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            background: rgba(34, 34, 34, 0.8); /* Fondo semi-transparente */
            text-align: center; /* Centra el contenido dentro del contenedor */
            margin: 0 auto; /* Centra el contenedor en la página */
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

<!-- Barra de navegación -->
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


    <h1>Registro de Vuelos</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Fecha de Viaje</th>
                <th>VIP</th>
                <th>Provincia</th>
                <th>Dirección</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($registros): ?>
                <?php foreach ($registros as $registro): ?>
                    <tr>
                        <td><?= htmlspecialchars($registro['nombre']); ?></td>
                        <td><?= htmlspecialchars($registro['Edad']); ?></td>
                        <td><?= htmlspecialchars($registro['Fecha']); ?></td>
                        <td><?= htmlspecialchars($registro['VIP']); ?></td>
                        <td><?= htmlspecialchars($registro['Provincia']); ?></td>
                        <td><?= htmlspecialchars($registro['direccion']); ?></td>
                        <td>
                            <a href="editar_vuelo.php?id=<?= $registro['id']; ?>" class="button">Editar</a>
                            <a href="#" class="button" style="background-color: red;" 
                            onclick="event.preventDefault(); confirmarBorrado(<?= $registro['id']; ?>);">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No hay registros disponibles.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script>
        function confirmarBorrado(id) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás recuperar este registro después de eliminarlo!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, borrar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, redirigimos a la página de borrado
                    window.location.href = 'borrar_vuelo.php?id=' + id;
                }
            });
        }
    </script>

</body>
</html>
