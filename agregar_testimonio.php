<?php
session_start();
include 'db.php'; // Archivo de conexión a la base de datos

// Verifica si el usuario está autenticado
if (!isset($_SESSION['nombre_usuario']) || !isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Redirige al login si no está autenticado
    exit();
}

// Verifica que el formulario se haya enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contenido'])) {
    $contenido = trim($_POST['contenido']);
    $usuario_id = $_SESSION['usuario_id']; // ID del usuario en sesión

    // Inserta el testimonio en la base de datos
    $stmt = $pdo->prepare("INSERT INTO testimonios (contenido, usuario_id, fecha) VALUES (:contenido, :usuario_id, NOW())");
    $stmt->bindParam(':contenido', $contenido);
    $stmt->bindParam(':usuario_id', $usuario_id);

    if ($stmt->execute()) {
        header("Location: inicio.php"); // Redirige de vuelta a inicio.php después de guardar el testimonio
        exit();
    } else {
        echo "Error al agregar el testimonio. Inténtalo de nuevo.";
    }
} else {
    header("Location: inicio.php");
    exit();
}
?>
