<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <style>
        body {
            height: 100vh;
            background-image: url('avion.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }

        form {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            max-width: 400px;
            margin: auto;
            margin-top: 200px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        button {
            background-color: rgba(76, 175, 80, 0.8);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: rgba(69, 160, 73, 0.8);
        }

        .register-btn {
            display: block;
            margin-top: 15px;
            color: #4CAF50;
            text-decoration: none;
        }

        .register-btn:hover {
            text-decoration: underline;
        }

        .message {
            margin-top: 15px;
            color: red;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        form, h1, input, button, .register-btn {
            animation: fadeIn 0.5s ease-out forwards;
        }

    </style>
</head>
<body>
    <form action="login.php" method="post">
        <h1>Iniciar sesión</h1>
        <input type="text" name="username" placeholder="Nombre de usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Iniciar sesión</button>
        <br>
        <a href="register.php" class="register-btn">¿No tienes cuenta? Regístrate aquí</a>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="message"><?php echo htmlspecialchars($_SESSION['message']); unset($_SESSION['message']); ?></div>
        <?php endif; ?>
    </form>
</body>
</html>
