<header class="headerCrud"><a href="index.php?accion=inicio"><h1>CRUD de Usuarios</h1></a></header>
<nav class="navCrud">
    <div class="gridNav">
        <div><a href="index.php?accion=registrarUsuario">Registrar</a></div>
        <div><a href="index.php?accion=listarUsuario">Listar</a></div>
        <div><a href="index.php?accion=listarAlimento">Crud de Alimentos</a></div>
    </div>
</nav>
<main class="mainCrud">
    <form method="post" id="formularioRegistro">
        <h1>¡Inicia sesión!</h1>
        <label for="inputNombre">Nombre del usuario:</label>
        <input type="text" name="nombre" id="inputNombre" value="" placeholder="Nombre del usuario..." maxlength="20"
               required>
        <label for="inputContra1">Contraseña del usuario:</label>
        <input type="password" name="contra1" id="inputContra1" value="" placeholder="Contraseña del usuario..."
               maxlength="20" required>
        <button type="submit" id="botonRegistrar">Iniciar sesión</button>
    </form>
</main>
<?php
$registro = new AdminControlador();
$registro->ingresoControladorUsuario();
?>
