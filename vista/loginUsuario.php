<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../../estilos.css">
    <script src="../../scriptsLoginUsuario.js"></script>
</head>
<body class="cuerpoRegistro">
<div class="contenedorFormulario">
    <form action="###" method="post" id="formularioRegistro">
        <h1>¡Inicia sesión!</h1>
        <label for="inputNombre">Nombre del usuario:</label>
        <input type="text" name="nombre" id="inputNombre" value="" placeholder="Nombre del usuario..." maxlength="20"
               required>
        <label for="inputContra1">Contraseña del usuario:</label>
        <input type="password" name="contra1" id="inputContra1" value="" placeholder="Contraseña del usuario..."
               maxlength="20" required>
        <button type="submit" id="botonRegistrar">Iniciar sesión</button>
    </form>
</div>
</body>
</html>
<?php
require_once '../controlador/adminControlador.php';
require_once '../modelo/adminModelo.php';
$registro = new AdminControlador();
$registro->ingresoControladorUsuario();
?>