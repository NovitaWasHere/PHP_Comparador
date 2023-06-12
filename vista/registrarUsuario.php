<?php
session_start();
if (!$_SESSION["Administrador"]) {
    header("location:index.php?accion=inicio");

    exit();
}
?>
    <header class="headerCrud"><a href="index.php?accion=inicio"><h1>CRUD de Usuarios</h1></a></header>
    <nav class="navCrud">
        <div class="gridNavA">
            <div><a href="crudUsuarios.php?accion=listarUsuario">Listar</a></div>
            <div><a href="crudUsuarios.php?accion=listarAlimento">Crud Alimentos</a></div>
        </div>
    </nav>
    <main class="mainCrud">
        <form method="post" id="formularioRegistro">
            <h1>Registra un usuario</h1>
            <label for="inputCorreo">Correo electrónico:</label>
            <input type="email" name="email" id="inputCorreo" value="" placeholder="Correo electrónico..." required>
            <label for="inputNombre">Nombre del usuario:</label>
            <input type="text" name="nombre" id="inputNombre" value="" placeholder="Nombre del usuario..."
                   maxlength="20"
                   required>
            <label for="inputContra1">Contraseña del usuario:</label>
            <input type="password" name="contra1" id="inputContra1" value="" placeholder="Contraseña del usuario..."
                   maxlength="20" required>
            <label for="inputContra2">Repetir la contraseña:</label>
            <input type="password" name="contra2" id="inputContra2" value="" placeholder="Contraseña del usuario..."
                   maxlength="20" required>
            <button type="submit" id="botonRegistrar">Registrar</button>
            <label id="errorContra">¡No es la misma contraseña!</label>
        </form>
    </main>

<?php
$registrar = new UsuarioControlador();
$registrar->registrarUsuarioControlador();
?>