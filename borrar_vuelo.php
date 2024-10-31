<?php
session_start(); // Asegúrate de que esto esté al principio del archivo

// Verifica si la sesión está configurada
if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php"); // Redirige al login si no está autenticado
    exit();
}

// Incluir el conector a la base de datos
include 'db.php'; // Asegúrate de que este es el archivo correcto

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Preparar la consulta SQL para eliminar el registro
        $stmt = $pdo->prepare("DELETE FROM compania WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $_SESSION['mensaje'] = "Registro eliminado correctamente.";
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al eliminar: " . $e->getMessage();
    }
}

// Redirigir a registro_vuelos.php
header("Location: registro_vuelos.php");
exit();
?>
