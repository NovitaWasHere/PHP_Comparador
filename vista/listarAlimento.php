<?php
session_start();
if (!$_SESSION["Administrador"]) {
    header("location:index.php?accion=inicio");

    exit();
}
?>
<script src="vista/scriptsCrudAlimentos.js"></script>
<header class="headerCrud"><a href="index.php?accion=inicio"><h1>CRUD de Alimentos</h1></a></header>
<nav class="navCrud">
    <div class="gridNav">
        <div><a href="crudUsuarios.php?accion=registrarAlimento">Registrar</a></div>
        <div><a href="../index.php">Página principal</a></div>
        <div><a href="crudUsuarios.php?accion=listarUsuario">Crud de Usuarios</a></div>
    </div>
</nav>
<main class="mainCrud">
    <div class="gridAlimentos">
        <div class="tituloGrid">Id</div>
        <div class="tituloGrid">Nombre</div>
        <div class="tituloGrid">Hidratos Tot</div>
        <div class="tituloGrid">Azúcares</div>
        <div class="tituloGrid">Grasas Tot</div>
        <div class="tituloGrid">Grasas Sat</div>
        <div class="tituloGrid">Proteinas</div>
        <div class="tituloGrid">V Energético</div>
        <div class="tituloGrid">Tipo</div>
        <div class="tituloGrid"></div>
        <div class="tituloGrid"></div>
    </div>
</main>
<?php
$eliminar = new AlimentosControlador();
$eliminar->eliminarAlimentoControlador();
?>

