<?php
session_start();

if (!$_SESSION["Administrador"]) {
    header("location:index.php?accion=inicio");

    exit();
}
?>
<script src="scriptsCrudUsuario.js"></script>
<header class="headerCrud"><a href="crudUsuarios.php?accion=inicio"><h1>CRUD de Usuarios</h1></a></header>
<nav class="navCrud">
    <div class="gridNav">
        <div><a href="crudUsuarios.php?accion=registrarUsuario">Registrar</a></div>
        <div><a href="../index.php">Página principal</a></div>
        <div><a href="crudUsuarios.php?accion=listarAlimento">Crud Alimentos</a></div>
    </div>
</nav>
<main class="mainCrud">
    <div class="gridUsuarios">
        <div class="tituloGrid">Id</div>
        <div class="tituloGrid">Email</div>
        <div class="tituloGrid">Nombre</div>
        <div class="tituloGrid">Contraseña</div>
        <div class="tituloGrid">¿Administrador?</div>
        <div class="tituloGrid"></div>
        <div class="tituloGrid"></div>
    </div>
</main>

<?php
$eliminar = new UsuarioControlador();
$eliminar->eliminarUsuarioControlador();
?>
