<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>¡Regístrate!</title>
    <link rel="stylesheet" href="estilosCrud.css">
    <link rel="stylesheet" href="estilosInicio.css">
    <script src="scriptsCrudUsuario.js"></script>
</head>
<?php

include("header.php");

?>
<body class="body1">
<div class="contenedorFormulario">
    <form method="post" id="formularioRegistro">
        <h1>¡Regístrate!</h1>
        <label for="inputCorreo">Correo electrónico:</label>
        <input type="email" name="email" id="inputCorreo" value="" placeholder="Correo electrónico..." required>
        <label for="inputNombre">Nombre del usuario:</label>
        <input type="text" name="nombre" id="inputNombre" value="" placeholder="Nombre del usuario..." maxlength="20"
               required>
        <label for="inputContra1">Contraseña del usuario:</label>
        <input type="password" name="contra1" id="inputContra1" value="" placeholder="Contraseña del usuario..."
               maxlength="20" required>
        <label for="inputContra2">Repetir la contraseña:</label>
        <input type="password" name="contra2" id="inputContra2" value="" placeholder="Contraseña del usuario..."
               maxlength="20" required>
        <button type="submit" id="botonRegistrar">Registrarse</button>
        <a href="loginUsuario.php">¿Ya tienes cuenta?</a>
        <label id="errorContra">¡No es la misma contraseña!</label>
    </form>
</div>
</body>
</html>

<?php
require_once '../controlador/usuarioControlador.php';
require_once '../modelo/usuarioModelo.php';
$registrar = new UsuarioControlador();
$registrar->registrarseComoCliente();
?>