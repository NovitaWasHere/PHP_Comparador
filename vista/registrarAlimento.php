<?php
session_start();
if (!$_SESSION["Administrador"]) {
    header("location:index.php?accion=inicio");

    exit();
}
?>
<header class="headerCrud"><a href="index.php?accion=inicio"><h1>CRUD de Alimentos</h1></a></header>
<nav class="navCrud">
    <div class="gridNavA">
        <div><a href="crudUsuarios.php?accion=listarAlimento">Listar</a></div>
        <div><a href="crudUsuarios.php?accion=listarUsuario">Crud de Usuario</a></div>
    </div>
</nav>
<main class="mainCrud">
    <h1 id="hua">Registra un Alimento</h1>
    <form method="post" id="formularioRegistroA" enctype="multipart/form-data">
        <div>
            <label for="inputNombre">Nombre Alimento</label>
            <input type="text" id="inputNombre" name="nombre" placeholder="Nombre del Alimento.." minlength="0"
                   required>
        </div>
        <div id="rej">
            <div>
                <label for="inputHidratos">Hidratos Totales:</label>
                <input type="number" id="inputHidratos" name="hidratos" placeholder="Hidratos del Alimento..."
                       minlength="0"
                       required step="0.01">
            </div>
            <div>
                <label for="inputAzúcares">Azúcares:</label>
                <input type="number" id="inputAzúcares" name="azucares" placeholder="Azúcares del Alimento..."
                       minlength="0"
                       required step="0.01">
            </div>
        </div>
        <div id="rej">
            <div>
                <label for="inputGrasasT">Grasas totales:</label>
                <input type="number" id="inputGrasasT" name="grasasT" placeholder="Grasas Totales..." minlength="0"
                       required step="0.01">
            </div>
            <div>
                <label for="inputGrasasS">Grasas Saturadas:</label>
                <input type="number" id="inputGrasasS" name="grasasS" placeholder="Grasas Saturadas..." minlength="0"
                       required step="0.01">
            </div>
        </div>
        <div id="rej">
            <div>
                <label for="inputProteinas">Proteinas:</label>
                <input type="number" id="inputProteinas" name="proteinas" placeholder="Proteinas del alimento..."
                       minlength="0" required step="0.01">
            </div>
            <div>
                <label for="inputVEnergetico">Valor Energetico:</label>
                <input type="number" id="inputVEnergetico" name="energetico" placeholder="Valor Energetico..."
                       minlength="0"
                       required step="0.01">
            </div>
        </div>
        <div id="seleE">
            <label for="urlFoto">Imagen :</label>
            <input type="file" id="inputFile" name="urlFoto" style="width:150px">
            <label for="selectTipo">Tipo : </label>
            <select style="width:200px" name="tipoAlimento" id="tipoAlimento1">
                <option value="0" selected>Elige Tipo</option>
            </select>
        </div>
        <button type="submit" id="botonRegistrar">Registrar</button>
    </form>
</main>

<?php
$registrar = new AlimentosControlador();
$registrar->registrarAlimentoControlador();
?>
