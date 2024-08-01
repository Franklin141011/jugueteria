<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/form.css">
</head>
<body>
    <form action="/login" method="post">
        <h2>Login</h2>
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" required class="width-full">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required class="width-full">
        <button type="submit" class="primary">Iniciar Sesión</button>
    </form>
</body>
</html>
