<?php 
include 'db.php';
session_start();
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    // Buscamos al usuario usando el nombre de usuario
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['nombre_usuario'] = $user['nombre_usuario'];
        $_SESSION['usuario_id'] = $user['id']; // Almacenar el id del usuario en la sesión
        header("Location: inicio.php"); // Redirigir a inicio.php
        exit();
    } else {
        $_SESSION['message'] = "Usuario o contraseña incorrectos.";
        header("Location: index.html"); // Redirigir de nuevo a index.html
        exit();
    }
}
?>
