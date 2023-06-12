<?php
include('conexionBD.php');

//Primera forma SELECT:
/*$consultaSql = 'SELECT * FROM usuario';
$queryMySql = mysqli_query($conexion, $consultaSql);

while ($resultado = mysqli_fetch_array($queryMySql)) {
    echo "<br>";
    //var_dump($resultado);
    echo "El id es " . $resultado["idUsuario"] . ", ";
}

mysqli_close($conexion);*/

//Segunda forma SELECT:
/*echo "<br>";
$consultaSql = 'SELECT * FROM usuario';
$queryMySql = $conexion->query($consultaSql);

while ($resultado = $queryMySql->fetch_assoc()) {
    echo "<br>";
    echo "El NOMBRE es " . $resultado["nombre"];
}

$conexion->close();*/

//Sentencia UPDATE
/*
$consultaSql = 'UPDATE usuario set nombre = "Pedro" where idUsuario = 1';
$queryMySql = $conexion->query($consultaSql);
var_dump($queryMySql);
$conexion->close();*/

//Sentencia DELETE
/*
$consultaSql = 'DELETE FROM usuario where idUsuario = 1';
$queryMySql = $conexion->query($consultaSql);
var_dump($queryMySql);
$conexion->close();*/

//Sentencia INSERT


?>
