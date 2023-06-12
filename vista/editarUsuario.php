<?php
session_start();
if (!$_SESSION["Administrador"]) {
    header("location:index.php?accion=inicio");

    exit();
}
?>
<header class="headerCrud"><a href="index.php?accion=inicio"><h1>CRUD de Usuarios</h1></a></header>
<nav class="navCrud">
    <div class="gridNav">
        <div><a href="crudUsuarios.php?accion=registrarUsuario">Registrar</a></div>
        <div><a href="crudUsuarios.php?accion=listarUsuario">Listar</a></div>
        <div><a href="crudUsuarios.php?accion=listarAlimento">Crud de Alimentos</a></div>
    </div>
</nav>
<main class="mainCrud">
    <form method="post" id="formularioRegistroE">
        <h1>Actualiza un usuario</h1>
        <?php
        $editar = new UsuarioControlador();
        $editar->editarUsuarioControlador();

        $actualizar = new UsuarioControlador();
        $actualizar->actualizarUsuarioControlador();
        ?>
    </form>
</main>