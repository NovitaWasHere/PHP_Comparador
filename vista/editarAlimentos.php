<?php
session_start();
if (!$_SESSION["Administrador"]) {
    header("location:index.php?accion=inicio");

    exit();
}
?>
<header class="headerCrud"><a href="crudUsuarios.php?accion=inicio"><h1>CRUD de Alimento</h1></a></header>
<nav class="navCrud">
    <div class="gridNav">
        <div><a href="crudUsuarios.php?accion=registrarUsuario">Registrar</a></div>
        <div><a href="crudUsuarios.php?accion=listarAlimento">Listar </a></div>
        <div><a href="crudUsuarios.php?accion=listarUsuario">Crud de Usuarios</a></div>
    </div>
</nav>
<main class="mainCrud">
    <form method="post" id="formularioRegistro">
        <h1>Actualizar Alimento</h1>

        <?php
        $editar = new alimentosControlador();
        $editar->editarAlimentoControlador();

        $actualizar = new alimentosControlador();
        $actualizar->actualizarAlimentoControlador();
        ?>
    </form>
</main>
