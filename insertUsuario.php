<?php
include('includesPHP/conexionBD.php');
if (!empty($_POST["correo"])) {
    $correo = $_POST["correo"];
    $nombre = $_POST["nombre"];
    $contra1 = $_POST["contra1"];

    $consultaSql = "INSERT INTO usuario (email, nombre, contra) VALUES ('$correo', '$nombre', '$contra1')";
    $queryMySql = $conexion->query($consultaSql);

    if ($queryMySql == true) {
        echo "Registro realizado correctamente";
    } else {
        echo mysqli_error($conexion);
    }
    $conexion->close();
}
?>