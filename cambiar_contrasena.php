<?php
session_start();

if (!isset($_SESSION['nombre_usuario'])) {
    header("Location: login.php"); // Redirige al login si no está autenticado
    exit();
}

include 'db.php'; // Asegúrate de que este archivo se incluye correctamente

$nombre_usuario = $_SESSION['nombre_usuario'];

// Inicializar variable para mensajes
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $password_actual = $_POST['password_actual'];
    $nueva_contrasena = $_POST['nueva_contrasena'];
    $confirmar_contrasena = $_POST['confirmar_contrasena'];

    try {
        // Consulta para obtener la contraseña actual del usuario
        $sql = "SELECT password FROM usuarios WHERE nombre_usuario = :nombre_usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario);
        $stmt->execute();

        // Verificar si se encontró el usuario
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $password_hash = $row['password'];

            // Verificar la contraseña actual
            if (password_verify($password_actual, $password_hash)) {
                // Validar la nueva contraseña
                if ($nueva_contrasena === $confirmar_contrasena) {
                    // Hashear la nueva contraseña
                    $nueva_contrasena_hash = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

                    // Actualizar la contraseña en la base de datos
                    $update_sql = "UPDATE usuarios SET password = :nueva_contrasena WHERE nombre_usuario = :nombre_usuario";
                    $update_stmt = $pdo->prepare($update_sql);
                    $update_stmt->bindParam(':nueva_contrasena', $nueva_contrasena_hash);
                    $update_stmt->bindParam(':nombre_usuario', $nombre_usuario);
                    $update_stmt->execute();

                    // Mensaje de éxito
                    $mensaje = "Contraseña cambiada exitosamente";
                } else {
                    // Mensaje de error si las contraseñas no coinciden
                    $mensaje = "Las nuevas contraseñas no coinciden.";
                }
            } else {
                // Mensaje de error si la contraseña actual es incorrecta
                $mensaje = "La contraseña actual es incorrecta.";
            }
        } else {
            // Mensaje de error si el usuario no se encuentra
            $mensaje = "Usuario no encontrado.";
        }
    } catch (PDOException $e) {
        // Mensaje de error en caso de excepción
        $mensaje = "Error al actualizar la contraseña: " . $e->getMessage();
    }
}

// Redirigir a perfil con el mensaje
header("Location: perfil.php?mensaje=" . urlencode($mensaje)); // Redirigir con el mensaje
exit();
?>
