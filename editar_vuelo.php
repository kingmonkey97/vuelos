<?php
session_start(); // Asegúrate de que esto esté al principio del archivo

// Verifica si la sesión está configurada
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php"); // Redirige al login si no está autenticado
    exit();
}

// Incluir el conector a la base de datos
include 'db.php'; // Asegúrate de que este es el archivo correcto

// Verificar si se ha pasado un ID
if (!isset($_GET['id'])) {
    header("Location: registro_vuelos.php"); // Redirigir si no hay ID
    exit();
}

$id = $_GET['id'];

// Consultar el registro a editar
$stmt = $pdo->prepare("SELECT * FROM compania WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$registro = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si el registro existe
if (!$registro) {
    header("Location: registro_vuelos.php"); // Redirigir si no se encuentra el registro
    exit();
}

// Procesar el formulario al enviar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $Edad = $_POST['Edad'];
    $Fecha = $_POST['Fecha'];
    $VIP = $_POST['VIP'];
    $Provincia = $_POST['Provincia'];
    $direccion = $_POST['direccion'];

    try {
        // Preparar la consulta SQL para actualizar el registro
        $stmt = $pdo->prepare("UPDATE compania SET nombre = :nombre, Edad = :Edad, Fecha = :Fecha, VIP = :VIP, Provincia = :Provincia, direccion = :direccion WHERE id = :id");
        
        // Vincular los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':Edad', $Edad);
        $stmt->bindParam(':Fecha', $Fecha);
        $stmt->bindParam(':VIP', $VIP);
        $stmt->bindParam(':Provincia', $Provincia);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':id', $id);

        // Ejecutar la consulta
        $stmt->execute();

        $_SESSION['mensaje'] = "Registro actualizado correctamente.";
        header("Location: registro_vuelos.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al actualizar: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Vuelo</title>
    <style>
        body {
            height: 100vh; /* Asegura que el body ocupe toda la altura de la ventana */
            background-image: url('avion.jpg'); /* Ruta de la imagen de fondo */
            background-size: cover; /* Escala la imagen para cubrir toda la pantalla */
            background-position: center; /* Centra la imagen */
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #4CAF50;
            text-align: center; /* Centra el título */
            margin-top: 50px; /* Espacio superior */
        }

        form {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente */
            border-radius: 10px; /* Bordes redondeados */
            padding: 20px; /* Espaciado interno */
            max-width: 400px; /* Ancho máximo del formulario */
            margin: 50px auto; /* Centra el formulario en la pantalla */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3); /* Sombra para el formulario */
        }

        label {
            display: block; /* Hacer que cada etiqueta ocupe una línea completa */
            margin-bottom: 5px; /* Espacio inferior */
            color: #333; /* Color del texto */
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
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

    </style>
    
    
</head>
<body>

<h1>Editar Vuelo</h1>

<form action="editar_vuelo.php?id=<?= $id; ?>" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= htmlspecialchars($registro['nombre']); ?>" required /><br/><br/>

    <label>Edad:</label>
    <input type="number" name="Edad" min="1" max="90" value="<?= htmlspecialchars($registro['Edad']); ?>" required /><br/><br/>

    <label>Fecha de Viaje:</label>
    <input type="date" name="Fecha" value="<?= htmlspecialchars($registro['Fecha']); ?>" required /><br/><br/>

    <label>VIP:</label><br/>
    <input type="radio" name="VIP" value="si" <?= ($registro['VIP'] == 'si') ? 'checked' : ''; ?>> Si<br/>
    <input type="radio" name="VIP" value="no" <?= ($registro['VIP'] == 'no') ? 'checked' : ''; ?>> No<br/><br/>

    <label>Provincia:</label>
    <input type="text" name="Provincia" value="<?= htmlspecialchars($registro['Provincia']); ?>" required /><br/><br/>

    <label>Dirección:</label>
    <input type="text" name="direccion" value="<?= htmlspecialchars($registro['direccion']); ?>" required /><br/><br/>

    <input type="submit" value="Actualizar" />
</form>

</body>
</html>
