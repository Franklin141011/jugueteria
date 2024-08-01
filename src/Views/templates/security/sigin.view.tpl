<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/form.css">
</head>
<body>
    <form action="/register" method="post">
        <h2>Registro</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required class="width-full">
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" required class="width-full">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required class="width-full">
        <label for="rol">Rol:</label>
        <select id="rol" name="rol" class="width-full">
            <option value="cliente">Cliente</option>
            <option value="administrador">Administrador</option>
        </select>
        <button type="submit" class="primary">Registrar</button>
    </form>
</body>
</html>
