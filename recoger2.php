<?php
/*
session_start(); // Inicia la sesión para poder usar variables de sesión

// Incluir el conector a la base de datos
include 'db.php'; // Asegúrate de que este es el archivo correcto

// Verificar que el formulario se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario de manera segura
    $nombre = $_POST['nombre'];
    $Edad = $_POST['Edad'];
    $Fecha = $_POST['Fecha'];
    $VIP = $_POST['VIP'];
    $Provincia = $_POST['Provincia'];
    $direccion = $_POST['direccion'];

    try {
        // Preparar la consulta SQL
        $stmt = $pdo->prepare("INSERT INTO compania (nombre, Edad, Fecha, VIP, Provincia, direccion) VALUES (:nombre, :Edad, :Fecha, :VIP, :Provincia, :direccion)");

        // Vincular los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':Edad', $Edad);
        $stmt->bindParam(':Fecha', $Fecha);
        $stmt->bindParam(':VIP', $VIP);
        $stmt->bindParam(':Provincia', $Provincia);
        $stmt->bindParam(':direccion', $direccion);

        // Ejecutar la consulta
        $stmt->execute();

        // Mensaje de éxito
        $_SESSION['mensaje'] = "Registro insertado correctamente.";
    } catch (PDOException $e) {
        // Manejo de errores
        $_SESSION['mensaje'] = "Error al insertar: " . $e->getMessage();
    }

    // Redirigir a welcome.php
    header("Location: welcome.php");
    exit();
} else {
    echo "Método no permitido.";
}
    */

// En recoger2.php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $Edad = $_POST['Edad'];
    $Fecha = $_POST['Fecha'];
    $VIP = $_POST['VIP'];
    $Provincia = $_POST['Provincia'];
    $direccion = $_POST['direccion'];

    try {
        $stmt = $pdo->prepare("INSERT INTO compania (nombre, Edad, Fecha, VIP, Provincia, direccion) VALUES (:nombre, :Edad, :Fecha, :VIP, :Provincia, :direccion)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':Edad', $Edad);
        $stmt->bindParam(':Fecha', $Fecha);
        $stmt->bindParam(':VIP', $VIP);
        $stmt->bindParam(':Provincia', $Provincia);
        $stmt->bindParam(':direccion', $direccion);

        if ($stmt->execute()) {
            $_SESSION['mensaje'] = "Registro insertado correctamente.";
        } else {
            $_SESSION['mensaje'] = "Error al insertar.";
        }
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al insertar: " . $e->getMessage();
    }

    header("Location: welcome.php");
    exit();
}

?>
