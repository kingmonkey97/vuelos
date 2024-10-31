<?php

$host = 'https://kingmonkey97.github.io/vuelos/'; // Cambia esto si tu host es diferente
$db = 'sistema_usuarios'; // Nombre de tu base de datos
$user = 'root'; // Usuario de la base de datos
$pass = ''; // Contraseña del usuario

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit(); // Salir si hay un error
}
?>
